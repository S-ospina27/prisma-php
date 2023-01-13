<?php

namespace App\Models\Service;

use Database\Class\ReadSpareParts;
use Database\Class\SpareParts;
use LionSQL\Drivers\MySQL as DB;
use PhpParser\Node\Expr\Cast\Object_;

class SparePartsModel {

	public function __construct() {
		
	}

    public function createSparePartsDB(SpareParts $spareParts) {
        return DB::call('create_spare_parts', [
            $spareParts->getSparePartsName(),
            $spareParts->getSparePartsAmount()
        ])->execute();
    }

    public function readSparePartsDB() {
        return DB::table("spare_parts")
        ->select()
        ->getAll();
    }

    public function readBySparePartsDB($idspare_parts) {
        return DB::table("spare_parts")
        ->select()
        ->where(DB::equalTo('idspare_parts'),$idspare_parts)
        ->get();
    }

    public function updateSparePartsDB(SpareParts $spareParts) {
        return DB::call('update_spare_parts', [
            $spareParts->getSparePartsName(),
            $spareParts->getSparePartsAmount(),
            $spareParts->getIdspareParts()
        ])->execute();
    }

    public function update_spare_parts_amount( SpareParts $spareParts) {
        return DB::call('update_spare_parts_amount', [
            $spareParts->getSparePartsAmount(),
            $spareParts->getIdspareParts()
        ])->execute();
    }

}