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
        $readSpareParts= $this->sparePartsModel->readBySparePartsDB($Technical->getIdspareParts());
        if($Technical->getIdserviceStates() == 5  && $Technical->getTechnicalInventoryQuantityUsed() == 0) {
           if($readSpareParts->spare_parts_amount >= $Technical->getTechnicalInventoryAmount()) {
               $sparts->setSparePartsAmount(
                $readSpareParts->spare_parts_amount - $Technical->getTechnicalInventoryAmount()
            );
               $this->sparePartsModel->update_spare_parts_amount($sparts);
               $this->technicalInventoryModel->updateTechnicalInventoryDB($Technical);
               return response->success("Su solicitud fue aceptada");
           }
           return response->error("la cantidad ingresa es mayor a la del inventario global");
       }
       if($Technical->getIdserviceStates() == 5){
            if($readSpareParts->spare_parts_amount >= $Technical->getTechnicalInventoryAmount()) {
                $sparts->setSparePartsAmount(
                $readSpareParts->spare_parts_amount - $Technical->getTechnicalInventoryAmount()
                );
                $this->sparePartsModel->update_spare_parts_amount($sparts);
                $readTechnical=$this->technicalInventoryModel->readByTechnicalInventoryDB($Technical);
                if(isset($readTechnical->idusers)) {
                    $Technical->setIdtechnicalInventory($readTechnical->idtechnical_inventory);
                    $Technical->setTechnicalInventoryAmount(
                        $readTechnical->technical_inventory_amount + $Technical->getTechnicalInventoryAmount()
                    );
                    $Technical->setTechnicalInventoryQuantityAvailable(
                        $readTechnical->technical_inventory_quantity_available + (int) request->technical_inventory_amount
                    );
                    $Technical->setIdserviceStates(6);
                    $this->technicalInventoryModel->updateIncreaseTechnicalInventory($Technical);
                    return response->success("Sea incrementado el monto de su inventario");
                }else{
                    $this->technicalInventoryModel->createTechnicalInventoryDB(
                    TechnicalInventory::formFields()
                    ->setIdserviceStates(6)
                    ->setTechnicalInventoryQuantityUsed(0)
                    ->setTechnicalInventoryQuantityAvailable((int) request->technical_inventory_amount)
                    );
                    return response->success("se creo un nuevo ");
                }
            }
            return response->error("la cantidad ingresa es mayor a la del inventario global");
        }
        elseif ($Technical->getIdserviceStates() == 8) {
            if( $Technical->getTechnicalInventoryQuantityUsed() <= $Technical->getTechnicalInventoryAmount()) {
                $Technical->setTechnicalInventoryAmount(
                    $Technical->getTechnicalInventoryAmount() - $Technical->getTechnicalInventoryQuantityUsed()
                );
                $Technical->setTechnicalInventoryQuantityAvailable(
                $Technical->getTechnicalInventoryQuantityAvailable() - $Technical->getTechnicalInventoryQuantityUsed()
                );
                $this->technicalInventoryModel->updateReduceTechnicalInventoryDB($Technical);
                return response->success("se registraron la cantidad de repuestos usados correctamente");
            }
        }
    }


}



