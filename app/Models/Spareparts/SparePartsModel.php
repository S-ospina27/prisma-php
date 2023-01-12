<?php

namespace App\Models\Spareparts;

use Database\Class\SpareParts;
use LionSQL\Drivers\MySQL as DB;

class SparePartsModel {

	public function __construct() {
		
	}

	public function readSparePartsDB() {
		return DB::table("spare_parts")->select()->getAll();
	}

	public function readBySparePartsDB($idspare_parts) {
		return DB::table('spare_parts')
			->select()
			->where(DB::equalTo('idspare_parts'), $idspare_parts)
			->get();
	}

	public function createSparePartsDB(SpareParts $spareParts) {
		return DB::call('create_spare_parts', [
			$spareParts->getSparePartsName(),
			$spareParts->getSparePartsAmount(),
			$spareParts->getSparePartsDigitalQuantity()
		])->execute();
	}

	public function updateSparePartsDB(SpareParts $spareParts) {
		return DB::call('update_spare_parts', [
			$spareParts->getSparePartsName(),
			$spareParts->getSparePartsAmount(),
			$spareParts->getSparePartsDigitalQuantity(),
			$spareParts->getIdspareParts()
		])->execute();
	}

	public function updateSparePartsDigitalQuantityDB(SpareParts $spareParts) {
		return DB::call('updateSparePartsDigitalQuantity', [
			$spareParts->getSparePartsDigitalQuantity(),
			$spareParts->getIdspareParts()
		])->execute();
	}

}