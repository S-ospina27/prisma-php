<?php

namespace App\Http\Controllers\Service;

use App\Models\Service\ServiceRequestModel;
use Carbon\Carbon;
use LionSpreadsheet\Spreadsheet;
use Database\Class\ServiceRequest;
use LionFiles\Manage;
use LionHelpers\Str;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ServiceRequestController {

	private ServiceRequestModel $serviceRequest;

	public function __construct() {
		$this->serviceRequest = new ServiceRequestModel();
	}

	public function readServiceRequest() {
		return $this->serviceRequest->readServiceRequestDB();
	}

	public function updateServiceRequest() {
        $responseUpdate = $this->serviceRequest->updateServiceRequestDB(
            ServiceRequest::formFields()->setServiceRequestDateClose(
                request->idservice_states === 8 ? Carbon::now()->format('Y-m-d H:i:s') : null
            )
        );

        if($responseUpdate->status === 'database-error') {
            return response->error('Ocurrió un error al actualizar la solicitud');
        }

        return response->success('Solicitud actualizada correctamente');
    }

    public function exportServiceRequestExcel() {
        $export = $this->serviceRequest->exportServiceRequestDB((object) [
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
        $name = Manage::rename('service_request.xlsx', 'EXCEL');
        Manage::folder($fullpath);
        Spreadsheet::saveExcel(Str::of($fullpath)->concat($name)->get());

        return response->success("Excel generado correctamente", [
            "url" => Str::of(env->SERVER_URL)->concat("/")->concat($fullpath)->concat($name)->get(),
        ]);
    }

}