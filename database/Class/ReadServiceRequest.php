<?php

namespace Database\Class;

class ReadServiceRequest implements \JsonSerializable {

	private ?int $idservice_request = null;
	private ?int $idservice_states = null;
	private ?int $idproducts = null;
	private ?int $service_request_value = null;
	private ?string $service_request_payment_methods = null;
	private ?string $fullnamedealers = null;
	private ?string $fullnametechnical = null;
	private ?string $users_name = null;
	private ?string $users_lastname = null;
	private ?string $users_identification = null;
	private ?int $idusers_technical = null;
	private ?string $departments_name = null;
	private ?string $cities_name = null;
	private ?string $product_types_name = null;
	private ?string $products_reference = null;
	private ?string $service_type = null;
	private ?string $service_request_creation_date = null;
	private ?string $service_request_date_close = null;
	private ?string $service_request_client_name = null;
	private ?string $service_request_address = null;
	private ?string $service_request_neighborhood = null;
	private ?int $service_request_phone_contact = null;
	private ?string $service_request_email = null;
	private ?string $service_request_trouble_report = null;
	private ?string $service_request_evidence = null;
	private ?string $service_request_warranty = null;
	private ?string $service_request_date_visit = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadServiceRequest {
		$readservicerequest = new ReadServiceRequest();

		$readservicerequest->setIdserviceRequest(
			isset(request->idservice_request) ? request->idservice_request : null
		);

		$readservicerequest->setIdserviceStates(
			isset(request->idservice_states) ? request->idservice_states : null
		);

		$readservicerequest->setIdproducts(
			isset(request->idproducts) ? request->idproducts : null
		);

		$readservicerequest->setServiceRequestValue(
			isset(request->service_request_value) ? request->service_request_value : null
		);

		$readservicerequest->setServiceRequestPaymentMethods(
			isset(request->service_request_payment_methods) ? request->service_request_payment_methods : null
		);

		$readservicerequest->setFullnamedealers(
			isset(request->fullnamedealers) ? request->fullnamedealers : null
		);

		$readservicerequest->setFullnametechnical(
			isset(request->fullnametechnical) ? request->fullnametechnical : null
		);

		$readservicerequest->setUsersName(
			isset(request->users_name) ? request->users_name : null
		);

		$readservicerequest->setUsersLastname(
			isset(request->users_lastname) ? request->users_lastname : null
		);

		$readservicerequest->setUsersIdentification(
			isset(request->users_identification) ? request->users_identification : null
		);

		$readservicerequest->setIdusersTechnical(
			isset(request->idusers_technical) ? request->idusers_technical : null
		);

		$readservicerequest->setDepartmentsName(
			isset(request->departments_name) ? request->departments_name : null
		);

		$readservicerequest->setCitiesName(
			isset(request->cities_name) ? request->cities_name : null
		);

		$readservicerequest->setProductTypesName(
			isset(request->product_types_name) ? request->product_types_name : null
		);

		$readservicerequest->setProductsReference(
			isset(request->products_reference) ? request->products_reference : null
		);

		$readservicerequest->setServiceType(
			isset(request->service_type) ? request->service_type : null
		);

		$readservicerequest->setServiceRequestCreationDate(
			isset(request->service_request_creation_date) ? request->service_request_creation_date : null
		);

		$readservicerequest->setServiceRequestDateClose(
			isset(request->service_request_date_close) ? request->service_request_date_close : null
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

		$readservicerequest->setServiceRequestWarranty(
			isset(request->service_request_warranty) ? request->service_request_warranty : null
		);

		$readservicerequest->setServiceRequestDateVisit(
			isset(request->service_request_date_visit) ? request->service_request_date_visit : null
		);

		return $readservicerequest;
	}

	public function getIdserviceRequest(): ?int {
		return $this->idservice_request;
	}

	public function setIdserviceRequest(?int $idservice_request): ReadServiceRequest {
		$this->idservice_request = $idservice_request;
		return $this;
	}

	public function getIdserviceStates(): ?int {
		return $this->idservice_states;
	}

	public function setIdserviceStates(?int $idservice_states): ReadServiceRequest {
		$this->idservice_states = $idservice_states;
		return $this;
	}

	public function getIdproducts(): ?int {
		return $this->idproducts;
	}

	public function setIdproducts(?int $idproducts): ReadServiceRequest {
		$this->idproducts = $idproducts;
		return $this;
	}

	public function getServiceRequestValue(): ?int {
		return $this->service_request_value;
	}

	public function setServiceRequestValue(?int $service_request_value): ReadServiceRequest {
		$this->service_request_value = $service_request_value;
		return $this;
	}

	public function getServiceRequestPaymentMethods(): ?string {
		return $this->service_request_payment_methods;
	}

	public function setServiceRequestPaymentMethods(?string $service_request_payment_methods): ReadServiceRequest {
		$this->service_request_payment_methods = $service_request_payment_methods;
		return $this;
	}

	public function getFullnamedealers(): ?string {
		return $this->fullnamedealers;
	}

	public function setFullnamedealers(?string $fullnamedealers): ReadServiceRequest {
		$this->fullnamedealers = $fullnamedealers;
		return $this;
	}

	public function getFullnametechnical(): ?string {
		return $this->fullnametechnical;
	}

	public function setFullnametechnical(?string $fullnametechnical): ReadServiceRequest {
		$this->fullnametechnical = $fullnametechnical;
		return $this;
	}

	public function getUsersName(): ?string {
		return $this->users_name;
	}

	public function setUsersName(?string $users_name): ReadServiceRequest {
		$this->users_name = $users_name;
		return $this;
	}

	public function getUsersLastname(): ?string {
		return $this->users_lastname;
	}

	public function setUsersLastname(?string $users_lastname): ReadServiceRequest {
		$this->users_lastname = $users_lastname;
		return $this;
	}

	public function getUsersIdentification(): ?string {
		return $this->users_identification;
	}

	public function setUsersIdentification(?string $users_identification): ReadServiceRequest {
		$this->users_identification = $users_identification;
		return $this;
	}

	public function getIdusersTechnical(): ?int {
		return $this->idusers_technical;
	}

	public function setIdusersTechnical(?int $idusers_technical): ReadServiceRequest {
		$this->idusers_technical = $idusers_technical;
		return $this;
	}

	public function getDepartmentsName(): ?string {
		return $this->departments_name;
	}

	public function setDepartmentsName(?string $departments_name): ReadServiceRequest {
		$this->departments_name = $departments_name;
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

	public function getProductsReference(): ?string {
		return $this->products_reference;
	}

	public function setProductsReference(?string $products_reference): ReadServiceRequest {
		$this->products_reference = $products_reference;
		return $this;
	}

	public function getServiceType(): ?string {
		return $this->service_type;
	}

	public function setServiceType(?string $service_type): ReadServiceRequest {
		$this->service_type = $service_type;
		return $this;
	}

	public function getServiceRequestCreationDate(): ?string {
		return $this->service_request_creation_date;
	}

	public function setServiceRequestCreationDate(?string $service_request_creation_date): ReadServiceRequest {
		$this->service_request_creation_date = $service_request_creation_date;
		return $this;
	}

	public function getServiceRequestDateClose(): ?string {
		return $this->service_request_date_close;
	}

	public function setServiceRequestDateClose(?string $service_request_date_close): ReadServiceRequest {
		$this->service_request_date_close = $service_request_date_close;
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

	public function getServiceRequestWarranty(): ?string {
		return $this->service_request_warranty;
	}

	public function setServiceRequestWarranty(?string $service_request_warranty): ReadServiceRequest {
		$this->service_request_warranty = $service_request_warranty;
		return $this;
	}

	public function getServiceRequestDateVisit(): ?string {
		return $this->service_request_date_visit;
	}

	public function setServiceRequestDateVisit(?string $service_request_date_visit): ReadServiceRequest {
		$this->service_request_date_visit = $service_request_date_visit;
		return $this;
	}

}