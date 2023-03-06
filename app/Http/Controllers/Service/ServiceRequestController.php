<?php

namespace App\Http\Controllers\Service;

use App\Models\Service\ServiceRequestModel;
use App\Models\UsersModel;
use Carbon\Carbon;
use Database\Class\ReadUsers;
use LionSpreadsheet\Spreadsheet;
use Database\Class\ServiceRequest;
use LionFiles\Store;
use LionHelpers\Arr;
use LionHelpers\Str;
use LionMailer\Mailer;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ServiceRequestController {

	private ServiceRequestModel $serviceRequestModel;
    private UsersModel $usersModel;

    private ServiceRequest $serviceRequest;
    private ReadUsers $readUsers;

    public function __construct() {
        $this->serviceRequestModel = new ServiceRequestModel();
        $this->usersModel = new UsersModel();
    }

    private function sendMailServiceRequest() {
        $responseMailer = response->success();

        if ($this->serviceRequest->getIdserviceStates() === 6) {
            $content_email = Str::of(file_get_contents(storage_path("Template/html/service-request-pending-email.html")))
                ->replace("--DEALER_NAME--", $this->readUsers->getFullname())
                ->replace("--CLIENT_NAME--", $this->serviceRequest->getServiceRequestClientName())
                ->replace("--CLIENT_EMAIL--", $this->serviceRequest->getServiceRequestEmail())
                ->replace("--CLIENT_PHONE--", $this->serviceRequest->getServiceRequestPhoneContact())
                ->replace("--DESCRIPTION_REPORT--", $this->serviceRequest->getServiceRequestTroubleReport())
                ->get();

            $responseMailer = Mailer::from(env->MAIL_USERNAME)
                ->multiple(
                    $this->serviceRequest->getServiceRequestEmail(),
                    $this->readUsers->getUsersEmail()
                )
                ->replyTo(env->MAIL_USERNAME)
                ->subject('NUEVA NOVEDAD DEL DISTRIBUIDOR')
                ->body(utf8_decode($content_email))
                ->altBody(utf8_decode($content_email))
                ->embeddedImage("assets/img/prisma.png", "--IMG_REPLACE--")
                ->send();
        } elseif ($this->serviceRequest->getIdserviceStates() === 5) {
            $content_email = Str::of(file_get_contents(storage_path("Template/html/service-request-proccess-email.html")))
                ->replace("--TECHNICAL_NAME--", $this->readUsers->getFullname())
                ->replace("--TECHNICAL_PHONE--", $this->readUsers->getUsersPhone())
                ->replace("--DATE_VISIT--", $this->serviceRequest->getServiceRequestDateVisit())
                ->replace("--GUIDE--", "SL-{$this->serviceRequest->getIdserviceRequest()}")
                ->get();

            $responseMailer = Mailer::from(env->MAIL_USERNAME)
                ->multiple(
                    $this->serviceRequest->getServiceRequestEmail(),
                    $this->readUsers->getUsersEmail()
                )
                ->replyTo(env->MAIL_USERNAME)
                ->subject('TECNICO ASIGNADO')
                ->body(utf8_decode($content_email))
                ->altBody(utf8_decode($content_email))
                ->embeddedImage("assets/img/prisma.png", "--IMG_REPLACE--")
                ->send();
        } elseif ($this->serviceRequest->getIdserviceStates() === 8) {
            $content_email = Str::of(file_get_contents(storage_path("Template/html/service-request-finalized-email.html")))
                ->replace("--TECHNICAL_NAME--", $this->readUsers->getFullname())
                ->replace("--TECHNICAL_PHONE--", $this->readUsers->getUsersPhone())
                ->replace("--GARANTIA--", $this->serviceRequest->getServiceRequestWarranty())
                ->replace("--VALOR--", "$" . number_format($this->serviceRequest->getServiceRequestValue()))
                ->replace("--GUIDE--", "SL-{$this->serviceRequest->getIdserviceRequest()}")
                ->get();

            $responseMailer = Mailer::from(env->MAIL_USERNAME)
                ->multiple(
                    $this->serviceRequest->getServiceRequestEmail(),
                    $this->readUsers->getUsersEmail()
                )
                ->replyTo(env->MAIL_USERNAME)
                ->subject('SOLICITUD FINALIZADA')
                ->body(utf8_decode($content_email))
                ->altBody(utf8_decode($content_email))
                ->embeddedImage("assets/img/prisma.png", "--IMG_REPLACE--")
                ->send();
        }

        if ($responseMailer->status === 'error') {
            finish(response->error('No se ha enviado el correo'));
        }
    }

    public function createServiceRequest() {
        $this->serviceRequest = ServiceRequest::formFields()
            ->setServiceRequestCreationDate(Carbon::now()->format('Y-m-d H:i:s'))
            ->setIdserviceStates(6);

        $this->readUsers = $this->usersModel->readUsersByIdDB(
            (new ReadUsers())->setIdusers($this->serviceRequest->getIdusersDealers())
        );

        if ($this->readUsers->getIdroles() != 3) {
            return response->error("El distribuidor no existe");
        }

        $responseCreate = $this->serviceRequestModel->createServiceRequestDB($this->serviceRequest);
        if ($responseCreate->status === 'database-error') {
            return response->error("A ocurrido un error al generar la solicitud");
        }

        $this->sendMailServiceRequest();
        return response->success("Solicitud generada correctamente");
    }

    public function readServiceRequest() {
        return $this->serviceRequestModel->readServiceRequestDB();
    }

    public function readServiceRequestByState() {
        $readServiceRquest = $this->serviceRequestModel->readServiceRequestDB();

        if (!isset($readServiceRquest->status)) {
            return Arr::of($readServiceRquest)->tree("service_type");
        }

        return $readServiceRquest;
    }

    public function updateServiceRequest() {
        $this->serviceRequest = ServiceRequest::formFields();

        if (in_array($this->serviceRequest->getIdserviceStates(), [8, 9])) {
            $file_name = Store::rename(request->service_request_evidence['name'], 'IMG');

            Store::upload(
                request->service_request_evidence['tmp_name'],
                $file_name,
                "assets/img/service/request/evidence/"
            );

            $this->serviceRequest
                ->setServiceRequestDateClose(Carbon::now()->format('Y-m-d H:i:s'))
                ->setServiceRequestEvidence($file_name);
        }

        $responseUpdate = $this->serviceRequestModel->updateServiceRequestDB($this->serviceRequest);
        if($responseUpdate->status === 'database-error') {
            return response->error('Ocurrió un error al actualizar la solicitud');
        }

        if (in_array($this->serviceRequest->getIdserviceStates(), [5, 6, 8])) {
            $this->readUsers = $this->usersModel->readUsersByIdDB(
                (new ReadUsers())->setIdusers($this->serviceRequest->getIdusersTechnical())
            );

            $this->sendMailServiceRequest();
        }

        return response->success('Solicitud actualizada correctamente');
    }

    public function exportServiceRequestExcel() {
        $export = $this->serviceRequestModel->exportServiceRequestDB((object) [
            'date_start' => request->date_start,
            'date_end' => Carbon::parse(request->date_end)->addDay()->format('Y-m-d')
        ]);

        if (isset($export->status)) {
            return response->warning("No hay datos disponibles");
        }

        $index = 6;
        Spreadsheet::loadExcel(storage_path('Template/Excel/Ordenes_solicitudes.xlsx'), 'ORDENES_SOLICITUD');

        foreach($export as $key=> $request) {
            Spreadsheet::addBorder("A{$index}:T{$index}", Border::BORDER_THIN, "000000");
            Spreadsheet::addAlignmentHorizontal("A{$index}:T{$index}", 'center');
            Spreadsheet::addBackground("A{$index}:T{$index}","F2F2F2");

            Spreadsheet::setCell("A{$index}", $request->idservice_request);
            Spreadsheet::setCell("B{$index}", $request->fullnamedealers);
            Spreadsheet::setCell("C{$index}", $request->fullnametechnical);
            Spreadsheet::setCell("D{$index}", $request->departments_name);
            Spreadsheet::setCell("E{$index}", $request->cities_name);
            Spreadsheet::setCell("F{$index}", $request->product_types_name);
            Spreadsheet::setCell("G{$index}", $request->products_reference);
            Spreadsheet::setCell("H{$index}", $request->service_type);
            Spreadsheet::setCell("I{$index}", $request->service_request_creation_date);
            Spreadsheet::setCell("J{$index}", $request->service_request_date_visit);
            Spreadsheet::setCell("K{$index}", $request->service_request_date_close);
            Spreadsheet::setCell("L{$index}", $request->service_request_client_name);
            Spreadsheet::setCell("M{$index}", $request->service_request_address);
            Spreadsheet::setCell("N{$index}", $request->service_request_neighborhood);
            Spreadsheet::setCell("O{$index}", $request->service_request_phone_contact);
            Spreadsheet::setCell("P{$index}", $request->service_request_email);
            Spreadsheet::setCell("Q{$index}", $request->service_request_trouble_report);
            Spreadsheet::setCell("R{$index}", $request->service_request_warranty);
            Spreadsheet::setCell("S{$index}", $request->service_request_value);
            Spreadsheet::setCell("T{$index}", $request->service_request_payment_methods);
            $index++;
        }

        $fullpath = 'assets/excel/service_request/';
        $name = Store::rename('service_request.xlsx', 'EXCEL');
        Store::folder($fullpath);
        Spreadsheet::saveExcel(Str::of($fullpath)->concat($name)->get());

        return response->success("Excel generado correctamente", [
            "url" => Str::of(env->SERVER_URL)->concat("/")->concat($fullpath)->concat($name)->get(),
        ]);
    }

}