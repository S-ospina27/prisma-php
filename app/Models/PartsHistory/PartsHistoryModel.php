<?php

namespace App\Models\PartsHistory;

use LionSQL\Drivers\MySQL as DB;
use Database\Class\PartsHistory;
class PartsHistoryModel {

	public function __construct() {
		
	}
	public function readPartsHistoryDB(){

		return DB::table('parts_history')->select()->getAll();
	}

	public function CreatePartsHistoryDB(PartsHistory $partsHistory){

		return DB::call('create_parts_history',[
			$partsHistory->getIdserviceRequest(),
			$partsHistory->getIdspareParts(),
			$partsHistory->getPartsHistoryDigitalQuantity(),
			$partsHistory->getPartsHistoryCreationDate()
		])->execute();

	}

}