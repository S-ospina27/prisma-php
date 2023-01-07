<?php

namespace App\Http\Controllers\ServiceRequest;
use App\Models\ServiceRequest\ServiceRequestModel;
class ServiceRequestController {

	private ServiceRequestModel $serviceRequest;
	public function __construct() {
		$this->serviceRequest = new ServiceRequestModel();

	}

	public function readServiceRrequest(){

		return $this->serviceRequest->readServiceRrequestDB();
	}
}