<?php

namespace App\Http\Controllers\Service;

use App\Models\Service\SparePartsModel;
use Database\Class\SpareParts;

class SparePartsController {

	private SparePartsModel $sparePartsModel;

	public function __construct() {
		$this->sparePartsModel= new SparePartsModel();
	}

    public function createSpareParts() {
        $responseCreate = $this->sparePartsModel->createSparePartsDB(SpareParts::formFields());
        if ($responseCreate->status === 'database-error') {
            return response->error("A ocurrido un error al crear el repuesto");
        }

        return response->success("Repuesto registrado correctamente");
    }

    public function readSpareParts() {
        return $this->sparePartsModel->readSparePartsDB();
    }

    public function updateSpareParts() {
        $spareParts = SpareParts::formFields();
        $separate = explode("-", $spareParts->getSparePartsAmount());

        if (count($separate) > 1) {
            $spareParts->setSparePartsAmount(abs($spareParts->getSparePartsAmount()) * -1);
        }

        if ($spareParts->getSparePartsAmount() < 0) {
            $spareParts->setSparePartsAmount(
                (int) request->spare_parts_amount_copy - abs($spareParts->getSparePartsAmount())
            );
        } else {
            $spareParts->setSparePartsAmount(
                (int) request->spare_parts_amount_copy + $spareParts->getSparePartsAmount()
            );
        }

        $responseUpdate = $this->sparePartsModel->updateSparePartsDB($spareParts);
        if ($responseUpdate->status === 'database-error') {
            return response->error("A ocurrido un error al actualizar el repuesto");
        }

        return response->success("Repuesto actualizado correctamente");
    }

}