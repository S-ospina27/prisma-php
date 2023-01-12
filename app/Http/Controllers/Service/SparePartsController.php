<?php

namespace App\Http\Controllers\Service;

use App\Models\Service\SparePartsModel;
use Database\Class\SpareParts;

class SparePartsController {

	private SparePartsModel $sparePartsModel;

	public function __construct() {
		$this->sparePartsModel	= new SparePartsModel();
	}

	public function readSpareParts() {
		return $this->sparePartsModel->readSparePartsDB();
	}

	public function readSparePartsById($idspare_parts) {
		return $this->sparePartsModel->readSparePartsByIdDB($idspare_parts);
	}

	public function createSpareParts() {
		$createSpareParts = $this->sparePartsModel->createSparePartsDB(
			SpareParts::formFields()->setSparePartsDigitalQuantity(request->spare_parts_amount)
		);

		if($createSpareParts->status === 'database-error') {
			return response->error('Ocurrió un error al crear el repuesto');
		}

		return response->success('Repuesto creado correctamente');
	}

	public function updateSpareParts() {
        $spareParts = (new SpareParts())
            ->setIdspareParts((int) request->idspare_parts)
            ->setSparePartsAmount((int) request->spare_parts_amount);

		$sparePartsRead = $this->sparePartsModel->readSparePartsByIdDB($spareParts);

        $diference = $spareParts->getSparePartsAmount() - $sparePartsRead->getSparePartsAmount();
        $spareParts
            ->setSparePartsAmount($sparePartsRead->getSparePartsAmount() + $diference)
            ->setSparePartsDigitalQuantity($sparePartsRead->getSparePartsDigitalQuantity() + $diference)
            ->setSparePartsName($sparePartsRead->getSparePartsName());

		$updateSpareParts = $this->sparePartsModel->updateSparePartsDB($spareParts);
		if($updateSpareParts->status === 'database-error') {
			return response->error('Ocurrió un error al actualizar el repuesto');
		}

		return response->success('Repuesto actualizado correctamente');
	}

}