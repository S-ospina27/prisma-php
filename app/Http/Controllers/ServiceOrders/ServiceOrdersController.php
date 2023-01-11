<?php

namespace App\Http\Controllers\ServiceOrders;

use App\Models\ServiceOrders\ServiceOrdersModel;
use App\Models\UsersModel;
use Carbon\Carbon;
use Database\Class\ServiceOrders;
use Dompdf\Dompdf;
use Dompdf\Exception as DomException;
use LionFiles\Manage;
use LionSpreadsheet\Spreadsheet;
use LionHelpers\Str;
use LionMailer\Mailer;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ServiceOrdersController {

	private ServiceOrdersModel $serviceOrdersModel;
    private UsersModel $usersModel;

	public function __construct() {
		$this->serviceOrdersModel = new ServiceOrdersModel();
        $this->usersModel = new UsersModel();
	}

	public function createServiceOrders() {
        $code = md5(uniqid());
        $serviceOrders = ServiceOrders::formFields()
            ->setServiceOrdersCreationDate(Carbon::now()->format('Y-m-d H:i:s'))
            ->setIdserviceStates(1)
            ->setServiceOrdersConsecutive(request->service_orders_type === 'MUESTRA' ? 'OM' : 'OS')
            ->setServiceOrdersNotDefectiveAmount((int) request->service_orders_amount)
            ->setServiceOrdersCode($code);

        $responseCreate = $this->serviceOrdersModel->createServiceOrdersDB($serviceOrders);
        if($responseCreate->status === 'database-error') {
            return response->error('Ocurrió un error al crear la orden de servicio');
        }

        $order = $this->serviceOrdersModel->readServiceOrdersByCodeDB($serviceOrders);
        $this->exportServiceOrdersPDF($order->getIdserviceOrders());
        return response->success('Orden de servicio creada correctamente');
    }

    public function updateServiceOrders() {
        $serviceOrders = ServiceOrders::formFields()
            ->setServiceOrdersDateDelivery(Str::of(request->service_orders_date_delivery)->toNull())
            ->setServiceOrdersObservation(Str::of(request->service_orders_observation)->toNull())
            ->setServiceOrdersConsecutive(request->service_orders_type === 'MUESTRA' ? 'OM' : 'OS');

        if($serviceOrders->getIdserviceStates() === 7) {
            $serviceOrders->setServiceOrdersDateDelivery(Carbon::now()->format('Y-m-d H:i:s'));
        } elseif ($serviceOrders->getIdserviceStates() === 6) {
            $cont_sucs = $serviceOrders->getServiceOrdersAmount();

            if ($serviceOrders->getServiceOrdersDefectiveAmount() > 0) {
                $cont_sucs -= $serviceOrders->getServiceOrdersDefectiveAmount();
            }

            if ($serviceOrders->getServiceOrdersPendingAmount() > 0) {
                $cont_sucs -= $serviceOrders->getServiceOrdersPendingAmount();
            }

            $serviceOrders->setServiceOrdersNotDefectiveAmount($cont_sucs);
        }

        $responseUpdate = $this->serviceOrdersModel->updateServiceOrdersDB($serviceOrders);
        if($responseUpdate->status === 'database-error') {
            return response->error('Ocurrió un error al actualizar la orden de servicio');
        }

        return response->success('Orden de servicio actualizada correctamente');
    }

    public function readOrders() {
        return $this->serviceOrdersModel->readOrdersDB();
    }

    public function readOrdersProvider($idprovider_users) {
        return $this->serviceOrdersModel->readOrdersProviderDB($idprovider_users);
    }

    public function exportServiceOrdersExcel() {
        $export = $this->serviceOrdersModel->exportServiceOrdersDB((object) [
            'date_start' => request->date_start,
            'date_end' => Carbon::parse(request->date_end)->addDay()->format('Y-m-d')
        ]);

        if (isset($export->status)) {
            return response->warning("No hay datos disponibles");
        }

        $index = 6;
        Spreadsheet::loadExcel(storage_path('Template/Excel/Ordenes_servicio.xlsx'), 'ORDENES_SERVICIO');

        foreach($export as $key=> $item) {
            Spreadsheet::addBorder("A{$index}:N{$index}", Border::BORDER_THIN, "000000");
            Spreadsheet::addAlignmentHorizontal("A{$index}:N{$index}", 'center');
            Spreadsheet::addBackground("A{$index}:N{$index}","f2f2f2");
            Spreadsheet::setCell("A{$index}", $item->full_consecutive);
            Spreadsheet::setCell("B{$index}", $item->service_type);
            Spreadsheet::setCell("C{$index}", $item->products_reference);
            Spreadsheet::setCell("D{$index}", $item->service_orders_type);
            Spreadsheet::setCell("E{$index}", $item->fullname);
            Spreadsheet::setCell("F{$index}", $item->service_orders_amount);
            Spreadsheet::setCell("G{$index}", $item->service_orders_total_price);
            Spreadsheet::setCell("H{$index}", $item->service_orders_finished_product);
            Spreadsheet::setCell("I{$index}", $item->service_orders_creation_date);
            Spreadsheet::setCell("J{$index}", $item->service_orders_date_delivery);
            Spreadsheet::setCell("K{$index}", $item->service_orders_defective_amount);
            Spreadsheet::setCell("L{$index}", $item->service_orders_not_defective_amount);
            Spreadsheet::setCell("M{$index}", $item->service_orders_pending_amount);
            Spreadsheet::setCell("N{$index}", $item->service_orders_observation);
            $index ++;
        }

        $fullpath = 'assets/excel/service_orders/';
        $name = Manage::rename('service_orders.xlsx', 'EXCEL');
        manage::folder($fullpath);
        Spreadsheet::saveExcel(Str::of($fullpath)->concat($name)->get());

        return response->success("Excel generado correctamente", [
            "url" => Str::of(env->SERVER_URL)->concat("/")->concat($fullpath)->concat($name)->get(),
        ]);
    }

    public function exportServiceOrdersPDF($idservice_orders) {
        $order = $this->serviceOrdersModel->readServiceOrdersByIdDB(
            (new ServiceOrders())->setIdserviceOrders((int) $idservice_orders)
        );

        $pdf_name = "{$order->getFullConsecutive()}.pdf";
        $ext = Manage::getExtension("valsan.jpg");
        $base64 = "data:image/{$ext};base64," . base64_encode(file_get_contents("assets/img/valsan.jpg"));
        $total = number_format(($order->getServiceOrdersAmount() * $order->getServiceOrdersTotalPrice()));

        $content_pdf = Str::of(file_get_contents(storage_path("Template/html/service-orders-report.html")))
            ->replace("--IMAGE_REPLACE--", $base64)
            ->replace("--PROVIDER_NAME_REPLACE--", "{$order->getUsersName()} {$order->getUsersLastname()}")
            ->replace("--PROVIDER_IDENTIFICATION_REPLACE--", $order->getUsersIdentification())
            ->replace("--PROVIDER_DOCUMENT_TYPE_REPLACE--", $order->getDocumentTypesName())
            ->replace("--PROVIDER_ADDRESS_REPLACE--", $order->getUsersAddress())
            ->replace("--PROVIDER_PHONE_REPLACE--", $order->getUsersPhone())
            ->replace("--PROVIDER_EMAIL_REPLACE--", $order->getUsersEmail())
            ->replace("--ORDER_CONSECUTIVE_REPLACE--", $order->getFullConsecutive())
            ->replace("--ORDER_CREATION_DATE_REPLACE--", $order->getServiceOrdersCreationDate())
            ->replace("--ORDER_PRODUCT_TYPE_REPLACE--", $order->getProductTypesName())
            ->replace("--ORDER_REFERENCE_REPLACE--", $order->getProductsReference())
            ->replace("--ORDER_DESCRIPTION_REPLACE--", $order->getProductsDescription())
            ->replace("--ORDER_QUANTITY_REPLACE--", $order->getServiceOrdersAmount())
            ->replace("--ORDER_VALUE_REPLACE--", number_format($order->getServiceOrdersTotalPrice()))
            ->replace("--ORDER_TOTAL_REPLACE--", $total)
            ->get();

        file_put_contents("assets/example.pdf", $content_pdf);

        try {
            $dompdf = new Dompdf();
            $dompdf->loadHtml(utf8_encode($content_pdf));
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            // file_put_contents("assets/{$pdf_name}", $dompdf->output());
            file_put_contents("assets/example.pdf", $dompdf->output());
        } catch (DomException $e) {
            finish(response->error("A ocurrido un error al generar la orden de servicio [PDF]"));
        }

        // $content_email = Str::of(file_get_contents(storage_path("Template/html/service-orders-email.html")))
        //     ->replace("--CONSECUTIVE--", $order->getFullConsecutive())
        //     ->replace("--PROVIDER_NAME--", $order->getFullname())
        //     ->replace("--URL_SERVICE_ORDERS--", env->SERVER_URL_AUD . "/service-orders")
        //     ->get();

        // $responseMailer = Mailer::from(env->MAIL_USERNAME)
        //     ->address($order->getUsersEmail())
        //     ->replyTo(env->MAIL_USERNAME)
        //     ->subject('Valsan Networking')
        //     ->body(utf8_decode($content_email))
        //     ->altBody(utf8_decode($content_email))
        //     ->attachment("assets/{$pdf_name}", $order->getFullConsecutive() . '.pdf')
        //     ->embeddedImage("assets/img/prisma.png", "--IMG_REPLACE--")
        //     ->send();

        // if ($responseMailer->status === 'error') {
        //     return response->error('No se ha enviado el correo al proveedor');
        // }

        // Manage::remove("assets/{$pdf_name}");

        return response->success('PDF generado correctamente', [
            'url' => env->SERVER_URL . "/assets/example.pdf",
        ]);
    }

}