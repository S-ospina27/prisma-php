<?php

namespace App\Models\Manage;

use Database\Class\Status;
use LionSql\Drivers\MySQLDriver as DB;

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