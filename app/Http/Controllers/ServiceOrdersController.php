<?php

namespace App\Http\Controllers;

use App\Models\Service_ordersModel;
use Carbon\Carbon;
use Database\Class\ServiceOrders;
use LionFiles\Manage;
use LionSpreadsheet\Spreadsheet;
use LionHelpers\Str;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ServiceOrdersController {

	private Service_ordersModel $orders;

	public function __construct() {
		$this->orders =  new Service_ordersModel();
	}

	public function createOrders() {
		$createOrders= $this->orders->createOrdersDB(
			ServiceOrders::formFields()
				->setServiceOrdersCreationDate(Carbon::now()->format('Y-m-d H:i:s'))
				->setIdserviceStates(1)
		);

		if($createOrders->status==='database-error') {
			return response->error('ocurrio un error al crear la orden');
		}

		return response->success('se genero la orden correctamente');
	}

	public function updateOrders(){
		$serviceOrders=ServiceOrders::formFields();

		if($serviceOrders->getIdserviceStates() === 7){
			$serviceOrders->setServiceOrdersDateDelivery(Carbon::now()->format('Y-m-d H:i:s'));
		}

		$updateOrdes = $this->orders->updateOrdersDB($serviceOrders);

		if($updateOrdes->status === 'database-error'){
			return	response->error('ocurrio un error al actualizar la orden');
		}

		return response->success('se actualizo correctamente');
	}

	public function readOrders() {
		return $this->orders->readOrdersDB();
	}

	public function readOrdersProvider($idprovider_users) {
		return $this->orders->readOrdersProviderDB($idprovider_users);
	}

	public function exportServiceOrders() {
		$export = $this->orders->exportServiceOrdersDB((object)[
			'date_start'=>request->date_start,
			'date_end'=>Carbon::parse(request->date_end)->addDay()->format('Y-m-d')
		]);

		if (isset($export->status)) {
			return response->warning("No hay datos disponibles");
		}

		$index = 6;
		Spreadsheet::loadExcel(storage_path('Template/Excel/Ordenes_servicio.xlsx'), 'ORDENES_SERVICIO');

		foreach($export as $key=> $item){
			Spreadsheet::addBorder("A{$index}:N{$index}", Border::BORDER_THIN, "000000");
			Spreadsheet::addAlignmentHorizontal("A{$index}:N{$index}", 'center');
			Spreadsheet::addBackground("A{$index}:N{$index}","f2f2f2");
			Spreadsheet::setCell("A{$index}", $item->service_type);
			Spreadsheet::setCell("B{$index}", $item->fullname);
			Spreadsheet::setCell("C{$index}", $item->idproducts);
			Spreadsheet::setCell("D{$index}", $item->service_orders_creation_date);
			Spreadsheet::setCell("E{$index}", $item->service_orders_date_delivery);
			Spreadsheet::setCell("F{$index}", $item->service_orders_finished_product);
			Spreadsheet::setCell("G{$index}", $item->service_orders_type);
			Spreadsheet::setCell("H{$index}", $item->service_orders_consecutive);
			Spreadsheet::setCell("I{$index}", $item->service_orders_amount);
			Spreadsheet::setCell("J{$index}", $item->service_orders_not_defective_amount);
			Spreadsheet::setCell("K{$index}", $item->service_orders_defective_amount);
			Spreadsheet::setCell("L{$index}", $item->service_orders_observation);
			Spreadsheet::setCell("M{$index}", $item->service_orders_total_price);
			Spreadsheet::setCell("N{$index}", $item->service_orders_pending_amount);
			$index ++;
		}

		$fullpath='assets/excel/service_orders/';
		$name=Manage::rename('service_orders.xlsx','EXCEL');

		Spreadsheet::saveExcel(
			Str::of($fullpath)->concat($name)->get()
		);

		return response->success("Excel generado correctamente",[
			"url"=>	Str::of(env->SERVER_URL)->concat("/")->concat($fullpath)->concat($name)->get(),
		]);
	}


}