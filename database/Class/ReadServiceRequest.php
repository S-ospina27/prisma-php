<?php

namespace Database\Class;

class ReadServiceRequest implements \JsonSerializable {

	private ?string $fullname = null;
	private ?string $cities_name = null;
	private ?string $product_types_name = null;
	private ?string $service_request_creation_date = null;
	private ?string $service_request_client_name = null;
	private ?string $service_request_address = null;
	private ?string $service_request_neighborhood = null;
	private ?int $service_request_phone_contact = null;
	private ?string $service_request_email = null;
	private ?string $service_request_trouble_report = null;
	private ?string $service_request_evidence = null;

	public function __construct() {}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadServiceRequest {
		$readservicerequest = new ReadServiceRequest();

		$readservicerequest->setFullname(
			isset(request->fullname) ? request->fullname : null
		);

		$readservicerequest->setCitiesName(
			isset(request->cities_name) ? request->cities_name : null
		);

		$readservicerequest->setProductTypesName(
			isset(request->product_types_name) ? request->product_types_name : null
		);

		$readservicerequest->setServiceRequestCreationDate(
			isset(request->service_request_creation_date) ? request->service_request_creation_date : null
		);

		$readservicerequest->setServiceRequestClientName(
			isset(request->service_request_client_name) ? request->service_request_client_name : null
		);

		$readservicerequest->setServiceRequestAddress(
			isset(request->service_request_address) ? request->service_request_address : null
		);

		$readservicerequest->setServiceRequestNeighborhood(
			isset(request->service_request_neighborhood) ? request->service_request_neighborhood : null
		);

		$readservicerequest->setServiceRequestPhoneContact(
			isset(request->service_request_phone_contact) ? request->service_request_phone_contact : null
		);

		$readservicerequest->setServiceRequestEmail(
			isset(request->service_request_email) ? request->service_request_email : null
		);

		$readservicerequest->setServiceRequestTroubleReport(
			isset(request->service_request_trouble_report) ? request->service_request_trouble_report : null
		);

		$readservicerequest->setServiceRequestEvidence(
			isset(request->service_request_evidence) ? request->service_request_evidence : null
		);

		return $readservicerequest;
	}

	public function getFullname(): ?string {
		return $this->fullname;
	}

	public function setFullname(?string $fullname): ReadServiceRequest {
		$this->fullname = $fullname;
		return $this;
	}

	public function getCitiesName(): ?string {
		return $this->cities_name;
	}

	public function setCitiesName(?string $cities_name): ReadServiceRequest {
		$this->cities_name = $cities_name;
		return $this;
	}

	public function getProductTypesName(): ?string {
		return $this->product_types_name;
	}

	public function setProductTypesName(?string $product_types_name): ReadServiceRequest {
		$this->product_types_name = $product_types_name;
		return $this;
	}

	public function getServiceRequestCreationDate(): ?string {
		return $this->service_request_creation_date;
	}

	public function setServiceRequestCreationDate(?string $service_request_creation_date): ReadServiceRequest {
		$this->service_request_creation_date = $service_request_creation_date;
		return $this;
	}

	public function getServiceRequestClientName(): ?string {
		return $this->service_request_client_name;
	}

	public function setServiceRequestClientName(?string $service_request_client_name): ReadServiceRequest {
		$this->service_request_client_name = $service_request_client_name;
		return $this;
	}

	public function getServiceRequestAddress(): ?string {
		return $this->service_request_address;
	}

	public function setServiceRequestAddress(?string $service_request_address): ReadServiceRequest {
		$this->service_request_address = $service_request_address;
		return $this;
	}

	public function getServiceRequestNeighborhood(): ?string {
		return $this->service_request_neighborhood;
	}

	public function setServiceRequestNeighborhood(?string $service_request_neighborhood): ReadServiceRequest {
		$this->service_request_neighborhood = $service_request_neighborhood;
		return $this;
	}

	public function getServiceRequestPhoneContact(): ?int {
		return $this->service_request_phone_contact;
	}

	public function setServiceRequestPhoneContact(?int $service_request_phone_contact): ReadServiceRequest {
		$this->service_request_phone_contact = $service_request_phone_contact;
		return $this;
	}

	public function getServiceRequestEmail(): ?string {
		return $this->service_request_email;
	}

	public function setServiceRequestEmail(?string $service_request_email): ReadServiceRequest {
		$this->service_request_email = $service_request_email;
		return $this;
	}

	public function getServiceRequestTroubleReport(): ?string {
		return $this->service_request_trouble_report;
	}

	public function setServiceRequestTroubleReport(?string $service_request_trouble_report): ReadServiceRequest {
		$this->service_request_trouble_report = $service_request_trouble_report;
		return $this;
	}

	public function getServiceRequestEvidence(): ?string {
		return $this->service_request_evidence;
	}

	public function setServiceRequestEvidence(?string $service_request_evidence): ReadServiceRequest {
		$this->service_request_evidence = $service_request_evidence;
		return $this;
	}

}