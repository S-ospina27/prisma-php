<?php

namespace App\Http\Controllers\PartsHistory;

use App\Models\PartsHistory\PartsHistoryModel;
use App\Models\Spareparts\SparePartsModel;
use Carbon\Carbon;
use Database\Class\PartsHistory;


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
		return $readSpart=  $this->sparePartsModel->readSparePartsDB();
		return $this->partsHistoryModel->CreatePartsHistoryDB(
			PartsHistory::formFields()
			->setPartsHistoryCreationDate(
				Carbon::now()->format('Y-m-d H:i:s')
			));
	}


}