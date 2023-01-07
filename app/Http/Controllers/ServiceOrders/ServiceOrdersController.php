<?php

namespace App\Http\Controllers\ServiceOrders;

use App\Models\ServiceOrders\ServiceOrdersModel;
use Carbon\Carbon;
use Database\Class\ServiceOrders;
use Dompdf\Dompdf;
use Dompdf\Exception as DomException;
use LionFiles\Manage;
use LionSpreadsheet\Spreadsheet;
use LionHelpers\Str;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ServiceOrdersController {

	private ServiceOrdersModel $serviceOrdersModel;

	public function __construct() {
		$this->serviceOrdersModel = new ServiceOrdersModel();
	}

	public function createServiceOrders() {
        $responseCreate = $this->serviceOrdersModel->createServiceOrdersDB(
            ServiceOrders::formFields()
                ->setServiceOrdersCreationDate(Carbon::now()->format('Y-m-d H:i:s'))
                ->setIdserviceStates(1)
                ->setServiceOrdersConsecutive(request->service_orders_type === 'MUESTRA' ? 'OM' : 'OS')
                ->setServiceOrdersNotDefectiveAmount((int) request->service_orders_amount)
        );

        if($responseCreate->status === 'database-error') {
            return response->error('Ocurrió un error al crear la orden de servicio');
        }

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
        $file_content = file_get_contents(storage_path("Template/html/order-service-report.html"));
        $serviceOrders = $this->serviceOrdersModel->readServiceOrdersByIdDB(
            (new ServiceOrders())->setIdserviceOrders((int) $idservice_orders)
        );

        $replace = Str::of("<tr>")
            ->concat("<td class='text-danger'>")
            ->concat($serviceOrders->getFullname())
            ->concat("</td>")
            ->concat("</tr>")
            ->get();

        $file_content = Str::of($file_content)->replace("--replace--", $replace)->get();
        // file_put_contents("assets/example.html", $file_content);

        try {
            $dompdf = new Dompdf();
            $dompdf->loadHtml(
                utf8_decode($file_content)
                // "<h1>Hello world</h1>"
            );
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            // $dompdf->stream("example.pdf", ['Attachment' => true]);
            file_put_contents("assets/example.pdf", $dompdf->output());
        } catch (DomException $e) {
            return $e;
        }

        // fullname, service_orders_creation_date, service_orders_date_delivery, product_types_name,
        // products_reference, service_orders_finished_product, full_consecutive, service_type
        // service_orders_amount, service_orders_not_defective_amount, service_orders_defective_amount,
        // service_orders_total_price, service_orders_observation

        return response->success('PDF generado correctamente', [
            'url' => env->SERVER_URL . "/assets/example.pdf"
        ]);
    }

}