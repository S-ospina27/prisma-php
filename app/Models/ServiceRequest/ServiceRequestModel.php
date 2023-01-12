<?php

namespace App\Models\ServiceRequest;

use LionSQL\Drivers\MySQL as DB;
use Database\Class\ServiceRequest;

class ServiceRequestModel {

	public function __construct() {
		
	}

	public function readServiceRequestDB(){
		return DB::table('read_service_request')
		->select()
		->getAll();
	}

	public function updateServiceRequestDB(ServiceRequest $serviceRequest) {
		// finish($serviceRequest);

		return DB::call('update_services_request', [
			$serviceRequest->getIdusersTechnical(),
			$serviceRequest->getIdserviceStates(),
			$serviceRequest->getServiceRequestDateVisit(),
			$serviceRequest->getIdserviceRequest(),
		])->execute();
	}


	public function exportServiceRequestDB(object $dates) {
        return DB::table('read_service_request')
            ->select()
            ->where('service_request_creation_date')
            ->between($dates->date_start, $dates->date_end)
            ->getAll();
    }
}