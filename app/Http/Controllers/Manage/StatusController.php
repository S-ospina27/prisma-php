<?php

namespace App\Http\Controllers\Manage;

use App\Models\Manage\StatusModel;

class StatusController {

    private StatusModel $statusModel;

	public function __construct() {
        $this->statusModel = new StatusModel();
	}

    public function readStatus() {
        return $this->statusModel->readStatusDB();
    }

}