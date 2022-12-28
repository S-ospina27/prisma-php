<?php

namespace App\Models\Manage;

use Database\Class\ServiceStates;
use LionSql\Drivers\MySQLDriver as DB;

class ServiceStatesModel {

	public function __construct() {
		
	}

    public function readServiceStatesDB() {
        return DB::fetchClass(ServiceStates::class)
            ->table('service_states')
            ->select()
            ->getAll();
    }

}