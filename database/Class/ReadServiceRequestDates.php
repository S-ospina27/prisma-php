<?php

namespace Database\Class;

class ReadServiceRequestDates implements \JsonSerializable {

	private ?int $idservice_request = null;
	private ?int $idusers_dealers = null;
	private ?string $fullname_d = null;
	private ?int $idcities = null;
	private ?string $cities_name = null;
	private ?string $departments_name = null;
	private ?int $idusers_technical = null;
	private ?string $fullname_t = null;
	private ?int $idservice_states = null;
	private ?string $service_type = null;
	private ?string $service_request_creation_date = null;
	private ?string $service_request_date_visit = null;
	private ?string $service_request_date_close = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadServiceRequestDates {
		$readservicerequestdates = new ReadServiceRequestDates();

		$readservicerequestdates->setIdserviceRequest(
			isset(request->idservice_request) ? request->idservice_request : null
		);

		$readservicerequestdates->setIdusersDealers(
			isset(request->idusers_dealers) ? request->idusers_dealers : null
		);

		$readservicerequestdates->setFullnameD(
			isset(request->fullname_d) ? request->fullname_d : null
		);

		$readservicerequestdates->setIdcities(
			isset(request->idcities) ? request->idcities : null
		);

		$readservicerequestdates->setCitiesName(
			isset(request->cities_name) ? request->cities_name : null
		);

		$readservicerequestdates->setDepartmentsName(
			isset(request->departments_name) ? request->departments_name : null
		);

		$readservicerequestdates->setIdusersTechnical(
			isset(request->idusers_technical) ? request->idusers_technical : null
		);

		$readservicerequestdates->setFullnameT(
			isset(request->fullname_t) ? request->fullname_t : null
		);

		$readservicerequestdates->setIdserviceStates(
			isset(request->idservice_states) ? request->idservice_states : null
		);

		$readservicerequestdates->setServiceType(
			isset(request->service_type) ? request->service_type : null
		);

		$readservicerequestdates->setServiceRequestCreationDate(
			isset(request->service_request_creation_date) ? request->service_request_creation_date : null
		);

		$readservicerequestdates->setServiceRequestDateVisit(
			isset(request->service_request_date_visit) ? request->service_request_date_visit : null
		);

		$readservicerequestdates->setServiceRequestDateClose(
			isset(request->service_request_date_close) ? request->service_request_date_close : null
		);

		return $readservicerequestdates;
	}

	public function getIdserviceRequest(): ?int {
		return $this->idservice_request;
	}

	public function setIdserviceRequest(?int $idservice_request): ReadServiceRequestDates {
		$this->idservice_request = $idservice_request;
		return $this;
	}

	public function getIdusersDealers(): ?int {
		return $this->idusers_dealers;
	}

	public function setIdusersDealers(?int $idusers_dealers): ReadServiceRequestDates {
		$this->idusers_dealers = $idusers_dealers;
		return $this;
	}

	public function getFullnameD(): ?string {
		return $this->fullname_d;
	}

	public function setFullnameD(?string $fullname_d): ReadServiceRequestDates {
		$this->fullname_d = $fullname_d;
		return $this;
	}

	public function getIdcities(): ?int {
		return $this->idcities;
	}

	public function setIdcities(?int $idcities): ReadServiceRequestDates {
		$this->idcities = $idcities;
		return $this;
	}

	public function getCitiesName(): ?string {
		return $this->cities_name;
	}

	public function setCitiesName(?string $cities_name): ReadServiceRequestDates {
		$this->cities_name = $cities_name;
		return $this;
	}

	public function getDepartmentsName(): ?string {
		return $this->departments_name;
	}

	public function setDepartmentsName(?string $departments_name): ReadServiceRequestDates {
		$this->departments_name = $departments_name;
		return $this;
	}

	public function getIdusersTechnical(): ?int {
		return $this->idusers_technical;
	}

	public function setIdusersTechnical(?int $idusers_technical): ReadServiceRequestDates {
		$this->idusers_technical = $idusers_technical;
		return $this;
	}

	public function getFullnameT(): ?string {
		return $this->fullname_t;
	}

	public function setFullnameT(?string $fullname_t): ReadServiceRequestDates {
		$this->fullname_t = $fullname_t;
		return $this;
	}

	public function getIdserviceStates(): ?int {
		return $this->idservice_states;
	}

	public function setIdserviceStates(?int $idservice_states): ReadServiceRequestDates {
		$this->idservice_states = $idservice_states;
		return $this;
	}

	public function getServiceType(): ?string {
		return $this->service_type;
	}

	public function setServiceType(?string $service_type): ReadServiceRequestDates {
		$this->service_type = $service_type;
		return $this;
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

}