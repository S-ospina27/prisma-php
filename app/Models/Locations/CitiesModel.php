<?php

namespace App\Models\Locations;

use Database\Class\Cities;
use Database\Class\Departments;
use LionSQL\Drivers\MySQL as DB;

class CitiesModel {

	public function __construct() {
		
	}

    public function readCitiesDB() {
        return DB::fetchClass(Cities::class)
            ->table('cities')
            ->select()
            ->getAll();
    }

    public function readCitiesByDepartmentDB(Departments $departments) {
        return DB::fetchClass(Cities::class)
            ->table('cities')
            ->select()
            ->where(DB::equalTo('iddepartments'), $departments->getIddepartments())
            ->getAll();
    }

}