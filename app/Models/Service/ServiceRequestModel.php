<?php

namespace App\Models\Service;

use Database\Class\ReadServiceRequest;
use Database\Class\ServiceRequest;
use LionSQL\Drivers\MySQL as DB;

class ServiceRequestModel {

	public function __construct() {
		
	}

	public function createServiceRequestDB(ServiceRequest $serviceRequest) {
		return DB::call('create_service_request', [
			$serviceRequest->getIdusersDealers(),
			$serviceRequest->getIdcities(),
			$serviceRequest->getIdproducts(),
			$serviceRequest->getIdserviceStates(),
			$serviceRequest->getServiceRequestCreationDate(),
			$serviceRequest->getServiceRequestClientName(),
			$serviceRequest->getServiceRequestAddress(),
			$serviceRequest->getServiceRequestNeighborhood(),
			$serviceRequest->getServiceRequestPhoneContact(),
			$serviceRequest->getServiceRequestEmail(),
			$serviceRequest->getServiceRequestTroubleReport(),
            $serviceRequest->getServiceRequestEvidence()
		])->execute();
	}

	public function readServiceRequestDB() {
		return DB::view('read_service_request')
    		->select()
    		->getAll();
	}

    public function readServiceRequestByIdDB(ServiceRequest $serviceRequest): ReadServiceRequest {
        return DB::fetchClass(ReadServiceRequest::class)
            ->view('read_service_request')
            ->select()
            ->where(DB::equalTo("idservice_request"), $serviceRequest->getIdserviceRequest())
            ->get();
    }


	public function updateServiceRequestDB(ServiceRequest $serviceRequest) {
		return DB::call('update_service_request', [
			$serviceRequest->getIdusersTechnical(),
			$serviceRequest->getIdserviceStates(),
			$serviceRequest->getServiceRequestDateVisit(),
			$serviceRequest->getServiceRequestDateClose(),
			$serviceRequest->getServiceRequestValue(),
			$serviceRequest->getServiceRequestPaymentMethods(),
			$serviceRequest->getServiceRequestTechnicalNovelty(),
			$serviceRequest->getServiceRequestEvidence(),
            $serviceRequest->getServiceRequestWarranty(),
			$serviceRequest->getIdserviceRequest(),
		])->execute();
	}

	public function exportServiceRequestDB(object $dates) {
		return DB::view('read_service_request')
    		->select()
    		->where('service_request_creation_date')
    		->between($dates->date_start, $dates->date_end)
    		->getAll();
	}

}