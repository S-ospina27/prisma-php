<?php

namespace App\Http\Controllers\PartsHistory;

use App\Models\PartsHistory\PartsHistoryModel;
use App\Models\Spareparts\SparePartsModel;
use Carbon\Carbon;
use Database\Class\PartsHistory;
use Database\Class\SpareParts;


class PartsHistoryController {

	private PartsHistoryModel $partsHistoryModel;
	private SparePartsModel $sparePartsModel;

	public function __construct() {

		$this->partsHistoryModel = new PartsHistoryModel();
		$this->sparePartsModel = new SparePartsModel();


	}

	public function readPartsHistory(){

		return $this->partsHistoryModel->readPartsHistoryDB();
	}


	public function CreatePartsHistory(){
		$readSpart=  $this->sparePartsModel->readSByparePartsDB(request->idspare_parts);

		if(request->parts_history_digital_quantity > $readSpart->spare_parts_digital_quantity){
			return response->error("El inventario no cuenta con la cantidad suficiente de repuestos que solicitas");
		}
		$this->sparePartsModel->updateSparePartsDigitalQuantityDB(
			SpareParts::formFields()
			->setSparePartsDigitalQuantity(
				$readSpart->spare_parts_digital_quantity - request->parts_history_digital_quantity
			)
			->setIdspareParts(request->idspare_parts)
		);
		return $this->partsHistoryModel->CreatePartsHistoryDB(
			PartsHistory::formFields()
			->setPartsHistoryCreationDate(
				Carbon::now()->format('Y-m-d H:i:s')
			));
	}


}