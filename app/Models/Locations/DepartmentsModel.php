<?php

namespace App\Models\Locations;

use Database\Class\Departments;
use LionSql\Drivers\MySQLDriver as DB;

class DepartmentsModel {

	public function __construct() {
		
	}

    public function readDepartmentsDB() {
        return DB::fetchClass(Departments::class)
            ->table('departments')
            ->select()
            ->getAll();
    }

}