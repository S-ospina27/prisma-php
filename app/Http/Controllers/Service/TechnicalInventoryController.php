<?php

namespace App\Http\Controllers\Service;

use App\Models\Service\TechnicalInventoryModel;
use Database\Class\TechnicalInventory;

class TechnicalInventoryController {

    private TechnicalInventoryModel $technicalInventoryModel;

	public function __construct() {
        $this->technicalInventoryModel = new TechnicalInventoryModel();
	}

    public function createTechnicalInventory() {
        $responseCreate = $this->technicalInventoryModel->createTechnicalInventoryDB(
            TechnicalInventory::formFields()
                ->setIdserviceStates(6)
                ->setTechnicalInventoryQuantityUsed(0)
                ->setTechnicalInventoryQuantityAvailable((int) request->technical_inventory_amount)
        );

        if ($responseCreate->status === 'database-error') {
            return response->error("A ocurrido un error al crear el inventario del tecnico");
        }

        return response->success("Inventario del tecnico creado correctamente");
    }

    public function readTechnicalInventory() {
        return $this->technicalInventoryModel->readTechnicalInventoryDB();
    }

}