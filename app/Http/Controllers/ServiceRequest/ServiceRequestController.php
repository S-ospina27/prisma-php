<?php

namespace App\Http\Controllers\ServiceRequest;

use App\Models\ServiceRequest\ServiceRequestModel;
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

	public function readServiceRequest(){

		return $this->serviceRequest->readServiceRequestDB();
	}
	public function updateServiceRequest(){

		$responseUpdate = $this->serviceRequest->updateServiceRequestDB(
			ServiceRequest::formFields()
		);

		if($responseUpdate->status === 'database-error') {
			return response->error('Ocurrió un error al actualizar la orden de solicitud');
		}

		return response->success('Orden de solicitud actualizada correctamente');
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
        Spreadsheet::loadExcel(storage_path('Template/Excel/Ordenes_solicitudes.xlsx'));

        foreach($export as $key=> $item) {
            Spreadsheet::addBorder("A{$index}:T{$index}", Border::BORDER_THIN, "000000");
            Spreadsheet::addAlignmentHorizontal("A{$index}:T{$index}", 'center');
            Spreadsheet::addBackground("A{$index}:T{$index}","f2f2f2");
            Spreadsheet::setCell("A{$index}", $item->idservice_request);
            Spreadsheet::setCell("B{$index}", $item->fullnamedealers);
            Spreadsheet::setCell("C{$index}", $item->fullnametechnical);
            Spreadsheet::setCell("D{$index}", $item->departments_name);
            Spreadsheet::setCell("E{$index}", $item->cities_name);
            Spreadsheet::setCell("F{$index}", $item->product_types_name);
            Spreadsheet::setCell("G{$index}", $item->products_reference);
            Spreadsheet::setCell("H{$index}", $item->service_type);
            Spreadsheet::setCell("I{$index}", $item->service_request_creation_date);
            Spreadsheet::setCell("J{$index}", $item->service_request_date_visit);
            Spreadsheet::setCell("K{$index}", $item->service_request_date_close);
            Spreadsheet::setCell("L{$index}", $item->service_request_client_name);
            Spreadsheet::setCell("M{$index}", $item->service_request_address);
            Spreadsheet::setCell("N{$index}", $item->service_request_neighborhood);
            Spreadsheet::setCell("O{$index}", $item->service_request_phone_contact);
            Spreadsheet::setCell("P{$index}", $item->service_request_email);
            Spreadsheet::setCell("Q{$index}", $item->service_request_trouble_report);
            Spreadsheet::setCell("R{$index}", $item->service_request_warranty);
            Spreadsheet::setCell("S{$index}", $item->service_request_value);
            Spreadsheet::setCell("T{$index}", $item->service_request_payment_methods);
            $index ++;
        }

        $fullpath = 'assets/excel/service_request/';
        $name = Manage::rename('service_request.xlsx', 'EXCEL');
        manage::folder($fullpath);
        Spreadsheet::saveExcel(Str::of($fullpath)->concat($name)->get());

        return response->success("Excel generado correctamente", [
            "url" => Str::of(env->SERVER_URL)->concat("/")->concat($fullpath)->concat($name)->get(),
        ]);
    }
}