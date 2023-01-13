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

        if($Technical->getIdserviceStates() == 3) {
           return $readSpareParts= $this->sparePartsModel->readBySparePartsDB($Technical->getIdspareParts());
           if($sparts->getSparePartsAmount() >= $Technical->getTechnicalInventoryAmount()) {
               $sparts->setSparePartsAmount($sparts->getSparePartsAmount() - $Technical->getTechnicalInventoryAmount());
               $this->sparePartsModel->update_spare_parts_amount($sparts);
               $this->technicalInventoryModel->updateTechnicalInventoryDB($Technical);
           }
       }
       $readTechnical=$this->technicalInventoryModel->readByTechnicalInventoryDB($Technical);
       if($Technical->getIdserviceStates() == 3){
           $readTechnical=$this->technicalInventoryModel->readByTechnicalInventoryDB($Technical);
           if(isset($readTechnical->idusers)) {
              $Technical->setIdtechnicalInventory($readTechnical->idtechnical_inventory);
              $Technical->setTechnicalInventoryAmount(
                  $readTechnical->technical_inventory_amount + $Technical->getTechnicalInventoryAmount()
              );
              $Technical->setTechnicalInventoryQuantityAvailable(
                $readTechnical->technical_inventory_quantity_available + (int) request->technical_inventory_amount
            );
            $this->technicalInventoryModel->updateIncreaseTechnicalInventory($Technical);
          }

      }










  //        $readTechnical=$this->technicalInventoryModel->readByTechnicalInventoryDB($Technical);
  //        if(isset($readTechnical->idusers)) {
  //           $Technical->setIdtechnicalInventory($readTechnical->idtechnical_inventory);
  //           $Technical->setTechnicalInventoryAmount(
  //               $readTechnical->technical_inventory_amount + $Technical->getTechnicalInventoryAmount()
  //           );
  //           $Technical->setTechnicalInventoryQuantityAvailable(
  //               $readTechnical->technical_inventory_quantity_available + (int) request->technical_inventory_amount
  //           );
  //           $this->technicalInventoryModel->updateIncreaseTechnicalInventory($Technical);
  //           return response->success("La cantidad de repuestos que ´posees  se aumento ");
  //       }
  //       else{
  //        $this->technicalInventoryModel->createTechnicalInventoryDB(
  //           TechnicalInventory::formFields()
  //           ->setIdserviceStates(6)
  //           ->setTechnicalInventoryQuantityUsed(0)
  //           ->setTechnicalInventoryQuantityAvailable((int) request->technical_inventory_amount)
  //       );
  //        return response->success("se Agrego una nueva solicitud de repuesto a tu inventario");

  //    }
  //    return $readSpareParts= $this->sparePartsModel->readBySparePartsDB($sparts->getIdspareParts());
  //    $sparts->setSparePartsAmount($readSpareParts->spare_parts_amount);
  //    if($sparts->getSparePartsAmount() >= $Technical->getTechnicalInventoryAmount()) {
  //       $sparts->setSparePartsAmount($sparts->getSparePartsAmount() - $Technical->getTechnicalInventoryAmount());
  //       $this->sparePartsModel->update_spare_parts_amount($sparts);
  //       $responseUpdate = $this->technicalInventoryModel->updateTechnicalInventoryDB($Technical);
  //       return response->success("Inventario del tecnico actualizado correctamente 3");
  //   }
  //   else{
  //     return response->error("la cantidad ingresada sobre pasa a la que hay en el inventario");
  // }
// }
     //      elseif ($Technical->getIdserviceStates() == 8) {
     //         if( $Technical->getTechnicalInventoryQuantityUsed() <= $Technical->getTechnicalInventoryAmount()) {
     //            $Technical->setTechnicalInventoryAmount(
     //                $Technical->getTechnicalInventoryAmount() - $Technical->getTechnicalInventoryQuantityUsed()
     //            );
     //            return $Technical;
     //    // $responseUpdate = $this->technicalInventoryModel->updateReduceTechnicalInventoryDB($Technical);
     //    // return response->success("Inventario del tecnico actualizado correctamente 8");
     //        }
     //        else{
     //         return response->error("Error la cantidad de ingresada de repuestos usados es mayor a la cantidad de repuesto que tiene en su inventario verifique porfavor");
     //     }
     // }
  }

}