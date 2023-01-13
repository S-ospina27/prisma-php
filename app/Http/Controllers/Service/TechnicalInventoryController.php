<?php

namespace App\Http\Controllers\Service;

use App\Models\Service\TechnicalInventoryModel;
use App\Models\Service\SparePartsModel;
use Database\Class\TechnicalInventory;
use Database\Class\SpareParts;


class TechnicalInventoryController {

    private TechnicalInventoryModel $technicalInventoryModel;
    private SparePartsModel $sparePartsModel;

    public function __construct() {
        $this->technicalInventoryModel = new TechnicalInventoryModel();
        $this->sparePartsModel = new SparePartsModel();
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

    public function updateTechnicalInventory(){
        $sparts = SpareParts::formFields();
        $Technical = TechnicalInventory::formFields();
       $readSpareParts= $this->sparePartsModel->readBySparePartsDB($sparts->getIdspareParts());
        $sparts->setSparePartsAmount($readSpareParts->spare_parts_amount);

        if($Technical->getTechnicalInventoryAmount() > $sparts->getSparePartsAmount()){
            return response->error("la cantidad ingresada sobre pasa a la que hay en el inventario");
        }
        elseif($Technical->getIdserviceStates() == 3){
            $sparts->setSparePartsAmount($sparts->getSparePartsAmount() - $Technical->getTechnicalInventoryAmount());
        }
        $this->sparePartsModel->update_spare_parts_amount($sparts);
        $responseUpdate = $this->technicalInventoryModel->updateTechnicalInventoryDB($Technical);
        if ($responseUpdate->status === 'database-error') {
            return response->error("A ocurrido un error al actualizar el inventario del tecnico");
        }
        return response->success("Inventario del tecnico actualizado correctamente");
    }

}