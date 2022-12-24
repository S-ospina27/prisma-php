<?php

namespace App\Http\Controllers\Manage;

use App\Models\Manage\RolesModel;

class RolesController {

    private RolesModel $rolesModel;

	public function __construct() {
        $this->rolesModel = new RolesModel();
	}

    public function readRoles() {
        return $this->rolesModel->readRolesDB();
    }

}