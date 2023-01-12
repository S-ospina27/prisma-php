<?php

namespace App\Http\Controllers\SpareParts;

use App\Models\Spareparts\SparePartsModel;
use Database\Class\SpareParts;

class SparePartsController {

	private SparePartsModel $sparePartsModel;

	public function __construct() {
		$this->sparePartsModel	= new SparePartsModel();
	}

	public function readSpareParts() {

		return $this->sparePartsModel->readSparePartsDB();
	}

public function readSBypareParts($idspare_parts) {
        return $this->sparePartsModel->readSByparePartsDB($idspare_parts);
    }

	public function createSpareParts(){

		return $this->sparePartsModel->createSparePartsDB(SpareParts::formFields());

	}

	public function updateSpareParts(){

		return $this->sparePartsModel->updateSparePartsDB(SpareParts::formFields());

	}


}