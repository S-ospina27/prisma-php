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

    public function updateReduceTechnicalInventoryDB(TechnicalInventory $technicalInventory) {
        return DB::call('update_reduce_technical_inventory', [
            $technicalInventory->getTechnicalInventoryAmount(),
            $technicalInventory->getTechnicalInventoryQuantityAvailable(),
            $technicalInventory->getTechnicalInventoryQuantityUsed(),
            $technicalInventory->getIdserviceStates(),
            $technicalInventory->getIdtechnicalInventory()
        ])->execute();
    }
    public function updateIncreaseTechnicalInventory(TechnicalInventory $technicalInventory) {
        return DB::call('update_increase_technical_inventory', [
            $technicalInventory->getTechnicalInventoryAmount(),
            $technicalInventory->getIdserviceStates(),
            $technicalInventory->getTechnicalInventoryQuantityAvailable(),
            $technicalInventory->getIdtechnicalInventory()
        ])->execute();
    }

    public function readTechnicalInventoryDB() {
        return DB::table('read_technical_inventory')
        ->select()
        ->getAll();
    }

    public function readByTechnicalInventoryDB(TechnicalInventory $technicalInventory) {
        return DB::table('technical_inventory')
        ->select()
        ->where(DB::equalTo('idusers'),$technicalInventory->getIdusers())
        ->and(DB::equalTo('idspare_parts'),$technicalInventory->getIdspareParts())
        ->get();
    }

}