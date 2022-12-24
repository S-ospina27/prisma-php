<?php

namespace App\Http\Controllers\Locations;

use App\Models\Locations\CitiesModel;
use Database\Class\Departments;

class CitiesController {

    private CitiesModel $citiesModel;

	public function __construct() {
        $this->citiesModel = new CitiesModel();
	}

    public function readCities() {
        return $this->citiesModel->readCitiesDB();
    }

    public function readCitiesByDepartment(string $iddepartments) {
        return $this->citiesModel->readCitiesByDepartmentDB(
            Departments::formFields()
                ->setIddepartments((int) $iddepartments)
        );
    }

}