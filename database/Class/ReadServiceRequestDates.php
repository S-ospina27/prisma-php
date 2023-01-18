<?php

namespace Database\Class;

class ReadServiceRequestDates implements \JsonSerializable {

	private ?string $service_request_creation_date = null;
	private ?string $service_request_date_visit = null;
	private ?string $service_request_date_close = null;
	private ?int $idusers_technical = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadServiceRequestDates {
		$readservicerequestdates = new ReadServiceRequestDates();

		$readservicerequestdates->setServiceRequestCreationDate(
			isset(request->service_request_creation_date) ? request->service_request_creation_date : null
		);

		$readservicerequestdates->setServiceRequestDateVisit(
			isset(request->service_request_date_visit) ? request->service_request_date_visit : null
		);

		$readservicerequestdates->setServiceRequestDateClose(
			isset(request->service_request_date_close) ? request->service_request_date_close : null
		);

		$readservicerequestdates->setIdusersTechnical(
			isset(request->idusers_technical) ? request->idusers_technical : null
		);

		return $readservicerequestdates;
	}

	public function getServiceRequestCreationDate(): ?string {
		return $this->service_request_creation_date;
	}

	public function setServiceRequestCreationDate(?string $service_request_creation_date): ReadServiceRequestDates {
		$this->service_request_creation_date = $service_request_creation_date;
		return $this;
	}

	public function getServiceRequestDateVisit(): ?string {
		return $this->service_request_date_visit;
	}

	public function setServiceRequestDateVisit(?string $service_request_date_visit): ReadServiceRequestDates {
		$this->service_request_date_visit = $service_request_date_visit;
		return $this;
	}

	public function getServiceRequestDateClose(): ?string {
		return $this->service_request_date_close;
	}

	public function setServiceRequestDateClose(?string $service_request_date_close): ReadServiceRequestDates {
		$this->service_request_date_close = $service_request_date_close;
		return $this;
	}

	public function getIdusersTechnical(): ?int {
		return $this->idusers_technical;
	}

	public function setIdusersTechnical(?int $idusers_technical): ReadServiceRequestDates {
		$this->idusers_technical = $idusers_technical;
		return $this;
	}

}