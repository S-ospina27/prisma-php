<?php

namespace App\Models\Service;

use Database\Class\ReadSpareParts;
use Database\Class\SpareParts;
use LionSQL\Drivers\MySQL as DB;

class SparePartsModel {

	public function __construct() {
		
	}

	public function readSparePartsDB() {
		return DB::table("read_spare_parts")->select()->getAll();
	}

	public function readSparePartsByIdDB(SpareParts $spareParts): ReadSpareParts {
		return DB::fetchClass(ReadSpareParts::class)
            ->table('read_spare_parts')
			->select()
			->where(DB::equalTo('idspare_parts'), $spareParts->getIdspareParts())
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
		return DB::call('update_spare_parts_digital_quantity', [
			$spareParts->getSparePartsDigitalQuantity(),
			$spareParts->getIdspareParts()
		])->execute();
	}

}