<?php

namespace App\Http\Controllers\Locations;

use App\Models\Locations\DepartmentsModel;

class DepartmentsController {

    private DepartmentsModel $departmentsModel;

	public function __construct() {
        $this->departmentsModel = new DepartmentsModel();
	}

    public function readDepartments() {
        return $this->departmentsModel->readDepartmentsDB();
    }

}