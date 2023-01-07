<?php

namespace App\Models\ServiceRequest;

use LionSQL\Drivers\MySQL as DB;
use Database\Class\ServiceRequest;

class ServiceRequestModel {

	public function __construct() {
		
	}

	public function readServiceRrequestDB(){

		return DB::table('read_service_request')
		->select()
		->getAll();

	}

}