<?php

namespace App\Models\Manage;

use Database\Class\Status;
use LionSQL\Drivers\MySQL as DB;

class StatusModel {

	public function __construct() {
		
	}

    public function readStatusDB() {
        return DB::fetchClass(Status::class)
            ->table('status')
            ->select()
            ->getAll();
    }

}