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
		$createSpareParts= $this->sparePartsModel->createSparePartsDB(
			SpareParts::formFields()->setSparePartsDigitalQuantity(request->spare_parts_amount)
		);

		if($createSpareParts->status === 'database-error') {
			return response->error('Ocurrió un error al crear el repuesto');
		}

		return response->success('Repuesto creado correctamente');
	}

	public function updateSpareParts() {

		$parts= $this->sparePartsModel->readSparePartsByIdDB(request->idspare_parts);

		if(request->spare_parts_amount > $parts->spare_parts_digital_quantity) {
			$spare_parts_amount=request->spare_parts_amount + $parts->spare_parts_amount;
			$amount_quantity=request->spare_parts_amount + $parts->spare_parts_digital_quantity;
		}

		$updateSpareParts = $this->sparePartsModel->updateSparePartsDB(
			SpareParts::formFields()
			->setSparePartsDigitalQuantity($amount_quantity)
			->setSparePartsAmount($spare_parts_amount)
		);
		if($updateSpareParts->status === 'database-error') {
			return response->error('Ocurrió un error al actualizar el repuesto');
		}
		return response->success('Repuesto Actualizado  correctamente');
	}

}