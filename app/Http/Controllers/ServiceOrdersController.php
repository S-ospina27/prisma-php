<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrdersModel;
use Carbon\Carbon;
use Database\Class\ServiceOrders;
use LionFiles\Manage;
use LionSpreadsheet\Spreadsheet;
use LionHelpers\Str;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ServiceOrdersController {

	private ServiceOrdersModel $orders;

	public function __construct() {
		$this->orders = new ServiceOrdersModel();
	}

	public function createServiceOrders() {
		$responseCreate = $this->orders->createServiceOrdersDB(
			ServiceOrders::formFields()
				->setServiceOrdersCreationDate(Carbon::now()->format('Y-m-d H:i:s'))
				->setIdserviceStates(1)
				->setServiceOrdersConsecutive(request->service_orders_type === 'MUESTRA' ? 'OM' : 'OS')
		);

		if($responseCreate->status === 'database-error') {
			return response->error('Ocurrió un error al crear la orden de servicio');
		}

		return response->success('Orden de servicio creada correctamente');
	}

	public function updateServiceOrders() {
		$serviceOrders = ServiceOrders::formFields()
			->setServiceOrdersObservation(Str::of(request->service_orders_observation)->toNull())
			->setServiceOrdersDateDelivery(Str::of(request->service_orders_date_delivery)->toNull())
			->setServiceOrdersNotDefectiveAmount(Str::of(request->service_orders_not_defective_amount)->toNull())
			->setServiceOrdersDefectiveAmount(Str::of(request->service_orders_defective_amount)->toNull())
			->setServiceOrdersPendingAmount(Str::of(request->service_orders_pending_amount)->toNull())
			->setServiceOrdersConsecutive(request->service_orders_type === 'MUESTRA' ? 'OM' : 'OS');

		if($serviceOrders->getIdserviceStates() === 7) {
			$serviceOrders->setServiceOrdersDateDelivery(Carbon::now()->format('Y-m-d H:i:s'));
		}

		$responseUpdate = $this->orders->updateServiceOrdersDB($serviceOrders);
		if($responseUpdate->status === 'database-error') {
			return $responseUpdate;
			return	response->error('Ocurrió un error al actualizar la orden de servicio');
		}

		return response->success('Orden de servicio actualizada correctamente');
	}

	public function readOrders() {
		return $this->orders->readOrdersDB();
	}

	public function readOrdersProvider($idprovider_users) {
		return $this->orders->readOrdersProviderDB($idprovider_users);
	}

	public function exportServiceOrders() {
		$export = $this->orders->exportServiceOrdersDB((object) [
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

}