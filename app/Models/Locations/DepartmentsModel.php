<?php

namespace App\Models\Locations;

use Database\Class\Departments;
use LionSql\Drivers\MySQL as DB;

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