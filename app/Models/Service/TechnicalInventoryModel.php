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
            $technicalInventory->getIdserviceStates(),
            $technicalInventory->getTechnicalInventoryCreationDate()
        ])->execute();
    }

    public function readTechnicalInventoryDB() {
        return DB::table('read_technical_inventory')
            ->select()
            ->getAll();
    }

    public function readTechnicalInventoryExistDB(TechnicalInventory $technicalInventory) {
        return DB::table('technical_inventory')
            ->select(DB::alias(DB::count('*'), 'cont'))
            ->where(DB::equalTo('idusers'), $technicalInventory->getIdusers())
            ->and(DB::equalTo('idspare_parts'), $technicalInventory->getIdspareParts())
            ->get();
    }

    public function updateTechnicalInventoryByPendingDB(TechnicalInventory $technicalInventory) {
        return DB::call('update_technical_inventory_pending', [
            $technicalInventory->getTechnicalInventoryAmount(),
            $technicalInventory->getTechnicalInventoryQuantityUsed(),
            $technicalInventory->getTechnicalInventoryQuantityAvailable(),
            $technicalInventory->getIdserviceStates(),
            $technicalInventory->getTechnicalInventoryDescription(),
            $technicalInventory->getTechnicalInventoryCreationDate(),
            $technicalInventory->getIdtechnicalInventory()
        ])->execute();
    }

    public function updateTechnicalInventoryByStateDB(TechnicalInventory $technicalInventory) {
        return DB::call('update_technical_inventory_state', [
            $technicalInventory->getIdserviceStates(),
            $technicalInventory->getTechnicalInventoryCreationDate(),
            $technicalInventory->getIdtechnicalInventory()
        ])->execute();
    }

    public function updateTechnicalInventoryByNoveltyDB(TechnicalInventory $technicalInventory) {
        return DB::call('update_technical_inventory_novelty', [
            $technicalInventory->getIdserviceStates(),
            $technicalInventory->getTechnicalInventoryDescription(),
            $technicalInventory->getTechnicalInventoryCreationDate(),
            $technicalInventory->getIdtechnicalInventory()
        ])->execute();
    }

}