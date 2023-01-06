<?php

namespace App\Http\Controllers\Manage;

use App\Models\Manage\ServiceStatesModel;

class ServiceStatesController {

    private ServiceStatesModel $serviceStatesModel;

	public function __construct() {
        $this->serviceStatesModel = new ServiceStatesModel();
	}

    public function readServiceStates() {
        return $this->serviceStatesModel->readServiceStatesDB();
    }

}