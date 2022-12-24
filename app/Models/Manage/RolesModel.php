<?php

namespace App\Models\Manage;

use Database\Class\Roles;
use LionSql\Drivers\MySQLDriver as DB;

class RolesModel {

	public function __construct() {
		
	}

    public function readRolesDB() {
        return DB::fetchClass(Roles::class)->table('roles')->select()->getAll();
    }

}