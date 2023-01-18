<?php

namespace Database\Class;

class ServiceRequestDates implements \JsonSerializable {

	private ?string $service_request_creation_date = null;
	private ?string $service_request_date_visit = null;
	private ?string $service_request_date_close = null;
	private ?int $idusers_technical = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ServiceRequestDates {
		$servicerequestdates = new ServiceRequestDates();

		$servicerequestdates->setServiceRequestCreationDate(
			isset(request->service_request_creation_date) ? request->service_request_creation_date : null
		);

		$servicerequestdates->setServiceRequestDateVisit(
			isset(request->service_request_date_visit) ? request->service_request_date_visit : null
		);

		$servicerequestdates->setServiceRequestDateClose(
			isset(request->service_request_date_close) ? request->service_request_date_close : null
		);

		$servicerequestdates->setIdusersTechnical(
			isset(request->idusers_technical) ? request->idusers_technical : null
		);

		return $servicerequestdates;
	}

	public function getServiceRequestCreationDate(): ?string {
		return $this->service_request_creation_date;
	}

	public function setServiceRequestCreationDate(?string $service_request_creation_date): ServiceRequestDates {
		$this->service_request_creation_date = $service_request_creation_date;
		return $this;
	}

	public function getServiceRequestDateVisit(): ?string {
		return $this->service_request_date_visit;
	}

	public function setServiceRequestDateVisit(?string $service_request_date_visit): ServiceRequestDates {
		$this->service_request_date_visit = $service_request_date_visit;
		return $this;
	}

	public function getServiceRequestDateClose(): ?string {
		return $this->service_request_date_close;
	}

	public function setServiceRequestDateClose(?string $service_request_date_close): ServiceRequestDates {
		$this->service_request_date_close = $service_request_date_close;
		return $this;
	}

	public function getIdusersTechnical(): ?int {
		return $this->idusers_technical;
	}

	public function setIdusersTechnical(?int $idusers_technical): ServiceRequestDates {
		$this->idusers_technical = $idusers_technical;
		return $this;
	}

}