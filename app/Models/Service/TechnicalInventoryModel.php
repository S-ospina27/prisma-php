<?php

namespace App\Models\Service;

use Database\Class\TechnicalInventory;
use LionSQL\Drivers\MySQL as DB;

class TechnicalInventoryModel {

	public function __construct() {
		
	}

    public function createTechnicalInventoryDB(TechnicalInventory $technicalInventory) {
        return DB::call('create_technical_inventory', [
            $technicalInventory->getIdusers(),
            $technicalInventory->getIdspareParts(),
            $technicalInventory->getTechnicalInventoryAmount(),
            $technicalInventory->getTechnicalInventoryQuantityUsed(),
            $technicalInventory->getTechnicalInventoryQuantityAvailable(),
            $technicalInventory->getIdserviceStates()
        ])->execute();
    }

    public function updateTechnicalInventoryDB(TechnicalInventory $technicalInventory) {
        return DB::call('update_technical_inventory', [
            $technicalInventory->getIdserviceStates(),
            $technicalInventory->getTechnicalInventoryDescription(),
            $technicalInventory->getIdtechnicalInventory()
        ])->execute();
    }
    public function readTechnicalInventoryDB() {
        return DB::table('read_technical_inventory')
        ->select()
        ->getAll();
    }

}