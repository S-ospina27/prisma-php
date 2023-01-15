<?php

namespace App\Http\Controllers\Service;

use App\Models\Service\TechnicalInventoryModel;
use App\Models\Service\SparePartsModel;
use Carbon\Carbon;
use Database\Class\TechnicalInventory;
use Database\Class\SpareParts;

class TechnicalInventoryController {

    private TechnicalInventoryModel $technicalInventoryModel;
    private SparePartsModel $sparePartsModel;

    private SpareParts $spareParts;
    private TechnicalInventory $technicalInventory;

    public function __construct() {
        $this->technicalInventoryModel = new TechnicalInventoryModel();
        $this->sparePartsModel = new SparePartsModel();
    }

    private function quantityValidate(SpareParts $quantity) {
        if ($this->technicalInventory->getTechnicalInventoryAmount() > $quantity->getSparePartsAmount()) {
            finish(response->warning("La cantidad solicitada excede de la cantidad disponible actualmente, vuelva a realizar una nueva solicitud: CANT DISPONIBLE ({$quantity->getSparePartsAmount()})"));
        }
    }

    private function updateAmount(SpareParts $quantity) {
        $responseUpdateSpareparts = $this->sparePartsModel->updateSparePartsAmountDB(
            $this->spareParts->setSparePartsAmount(
                $quantity->getSparePartsAmount() - $this->technicalInventory->getTechnicalInventoryAmount()
            )
        );

        if ($responseUpdateSpareparts->status === 'database-error') {
            finish(response->error("A ocurrido un error al añadir el repuesto al inventario del tecnico"));
        }
    }

    public function createTechnicalInventory() {
        $this->spareParts = SpareParts::formFields();
        $quantity = $this->sparePartsModel->readSparePartsByIdDB($this->spareParts);

        $this->technicalInventory = TechnicalInventory::formFields()
            ->setIdusers((int) request->idusers)
            ->setTechnicalInventoryCreationDate(Carbon::now()->format('Y-m-d H:i:s'));

        $existTechnicalInventory = $this->technicalInventoryModel->readTechnicalInventoryExistDB(
            $this->technicalInventory
        );

        $responseRequest = null;

        if ($existTechnicalInventory->cont === 0) {
            $this->quantityValidate($quantity);
            $this->updateAmount($quantity);

            $responseRequest = $this->technicalInventoryModel->createTechnicalInventoryDB(
                $this->technicalInventory
                    ->setIdserviceStates(6)
                    ->setTechnicalInventoryQuantityUsed(0)
                    ->setTechnicalInventoryQuantityAvailable((int) request->technical_inventory_amount)
            );
        } else {
            $calculate = $this->technicalInventory->getTechnicalInventoryAmount() + $this->technicalInventory->getTechnicalInventoryQuantityAvailable();

            if ($this->technicalInventory->getIdserviceStates() === 4) {
                $calculate -= $this->technicalInventory->getTechnicalInventoryAmount();
            } elseif ($this->technicalInventory->getIdserviceStates() === 8) {
                $this->quantityValidate($quantity);
                $this->updateAmount($quantity);
            }

            $responseRequest = $this->technicalInventoryModel->updateTechnicalInventoryByPendingDB(
                $this->technicalInventory
                    ->setIdserviceStates(6)
                    ->setTechnicalInventoryQuantityUsed(0)
                    ->setTechnicalInventoryAmount($calculate)
                    ->setTechnicalInventoryQuantityAvailable($calculate)
            );
        }

        if ($responseRequest->status === 'database-error') {
            return response->error("A ocurrido un error al añadir el repuesto al inventario del tecnico");
        }

        return response->success("Repuesto añadido correctamente");
    }

    public function readTechnicalInventory() {
        return $this->technicalInventoryModel->readTechnicalInventoryDB();
    }

    public function updateTechnicalInventory() {
        $responseUpdate = null;
        $technicalInventory = TechnicalInventory::formFields()
            ->setTechnicalInventoryCreationDate(Carbon::now()->format('Y-m-d H:i:s'));

        if (in_array($technicalInventory->getIdserviceStates(), [3, 5, 7, 8])) {
            $responseUpdate = $this->technicalInventoryModel->updateTechnicalInventoryByStateDB(
                $technicalInventory
            );
        } elseif ($technicalInventory->getIdserviceStates() === 4) {
            $responseUpdate = $this->technicalInventoryModel->updateTechnicalInventoryByNoveltyDB(
                $technicalInventory
            );
        }

        if ($responseUpdate->status === 'database-error') {
            return response->error("A ocurrido un error al actualizar el inventario");
        }

        return response->success("Inventario actualizado correctamente");
    }

}