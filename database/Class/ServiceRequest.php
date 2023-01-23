<?php

namespace Database\Class;

class ServiceRequest implements \JsonSerializable {

	private ?int $idservice_request = null;
	private ?int $idusers_dealers = null;
	private ?int $idcities = null;
	private ?int $idproducts = null;
	private ?int $idusers_technical = null;
	private ?int $idservice_states = null;
	private ?string $service_request_creation_date = null;
	private ?string $service_request_client_name = null;
	private ?string $service_request_address = null;
	private ?string $service_request_neighborhood = null;
	private ?int $service_request_phone_contact = null;
	private ?string $service_request_email = null;
	private ?string $service_request_trouble_report = null;
	private ?string $service_request_evidence = null;
	private ?string $service_request_warranty = null;
	private ?string $service_request_date_visit = null;
	private ?string $service_request_date_close = null;
	private ?int $service_request_value = null;
	private ?string $service_request_payment_methods = null;
	private ?string $service_request_technical_novelty = null;
	private ?string $service_request_payment_states_creation_date = null;
	private ?int $service_request_payment_states = null;
	private ?string $service_request_payment_paid_creation_date = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ServiceRequest {
		$servicerequest = new ServiceRequest();

		$servicerequest->setIdserviceRequest(
			isset(request->idservice_request) ? (int) request->idservice_request : null
		);

		$servicerequest->setIdusersDealers(
			isset(request->idusers_dealers) ? (int) request->idusers_dealers : null
		);

		$servicerequest->setIdcities(
			isset(request->idcities) ? (int) request->idcities : null
		);

		$servicerequest->setIdproducts(
			isset(request->idproducts) ? (int) request->idproducts : null
		);

		$servicerequest->setIdusersTechnical(
			isset(request->idusers_technical) ? (int) request->idusers_technical : null
		);

		$servicerequest->setIdserviceStates(
			isset(request->idservice_states) ? (int) request->idservice_states : null
		);

		$servicerequest->setServiceRequestCreationDate(
			isset(request->service_request_creation_date) ? request->service_request_creation_date : null
		);

		$servicerequest->setServiceRequestClientName(
			isset(request->service_request_client_name) ? request->service_request_client_name : null
		);

		$servicerequest->setServiceRequestAddress(
			isset(request->service_request_address) ? request->service_request_address : null
		);

		$servicerequest->setServiceRequestNeighborhood(
			isset(request->service_request_neighborhood) ? request->service_request_neighborhood : null
		);

		$servicerequest->setServiceRequestPhoneContact(
			isset(request->service_request_phone_contact) ? (int) request->service_request_phone_contact : null
		);

		$servicerequest->setServiceRequestEmail(
			isset(request->service_request_email) ? request->service_request_email : null
		);

		$servicerequest->setServiceRequestTroubleReport(
			isset(request->service_request_trouble_report) ? request->service_request_trouble_report : null
		);

        if (!is_array(request->service_request_evidence)) {
            $servicerequest->setServiceRequestEvidence(
                isset(request->service_request_evidence) ? request->service_request_evidence : null
            );
        }

		$servicerequest->setServiceRequestWarranty(
			isset(request->service_request_warranty) ? request->service_request_warranty : null
		);

		$servicerequest->setServiceRequestDateVisit(
			isset(request->service_request_date_visit) ? request->service_request_date_visit : null
		);

		$servicerequest->setServiceRequestDateClose(
			isset(request->service_request_date_close) ? request->service_request_date_close : null
		);

		$servicerequest->setServiceRequestValue(
			isset(request->service_request_value) ? (int) request->service_request_value : null
		);

		$servicerequest->setServiceRequestPaymentMethods(
			isset(request->service_request_payment_methods) ? request->service_request_payment_methods : null
		);

		$servicerequest->setServiceRequestTechnicalNovelty(
			isset(request->service_request_technical_novelty) ? request->service_request_technical_novelty : null
		);

		$servicerequest->setServiceRequestPaymentStatesCreationDate(
			isset(request->service_request_payment_states_creation_date) ? request->service_request_payment_states_creation_date : null
		);

		$servicerequest->setServiceRequestPaymentStates(
			isset(request->service_request_payment_states) ? request->service_request_payment_states : null
		);

		$servicerequest->setServiceRequestPaymentPaidCreationDate(
			isset(request->service_request_payment_paid_creation_date) ? request->service_request_payment_paid_creation_date : null
		);

		return $servicerequest;
	}

	public function getIdserviceRequest(): ?int {
		return $this->idservice_request;
	}

	public function setIdserviceRequest(?int $idservice_request): ServiceRequest {
		$this->idservice_request = $idservice_request;
		return $this;
	}

	public function getIdusersDealers(): ?int {
		return $this->idusers_dealers;
	}

	public function setIdusersDealers(?int $idusers_dealers): ServiceRequest {
		$this->idusers_dealers = $idusers_dealers;
		return $this;
	}

	public function getIdcities(): ?int {
		return $this->idcities;
	}

	public function setIdcities(?int $idcities): ServiceRequest {
		$this->idcities = $idcities;
		return $this;
	}

	public function getIdproducts(): ?int {
		return $this->idproducts;
	}

	public function setIdproducts(?int $idproducts): ServiceRequest {
		$this->idproducts = $idproducts;
		return $this;
	}

	public function getIdusersTechnical(): ?int {
		return $this->idusers_technical;
	}

	public function setIdusersTechnical(?int $idusers_technical): ServiceRequest {
		$this->idusers_technical = $idusers_technical;
		return $this;
	}

	public function getIdserviceStates(): ?int {
		return $this->idservice_states;
	}

	public function setIdserviceStates(?int $idservice_states): ServiceRequest {
		$this->idservice_states = $idservice_states;
		return $this;
	}

	public function getServiceRequestCreationDate(): ?string {
		return $this->service_request_creation_date;
	}

	public function setServiceRequestCreationDate(?string $service_request_creation_date): ServiceRequest {
		$this->service_request_creation_date = $service_request_creation_date;
		return $this;
	}

	public function getServiceRequestClientName(): ?string {
		return $this->service_request_client_name;
	}

	public function setServiceRequestClientName(?string $service_request_client_name): ServiceRequest {
		$this->service_request_client_name = $service_request_client_name;
		return $this;
	}

	public function getServiceRequestAddress(): ?string {
		return $this->service_request_address;
	}

	public function setServiceRequestAddress(?string $service_request_address): ServiceRequest {
		$this->service_request_address = $service_request_address;
		return $this;
	}

	public function getServiceRequestNeighborhood(): ?string {
		return $this->service_request_neighborhood;
	}

	public function setServiceRequestNeighborhood(?string $service_request_neighborhood): ServiceRequest {
		$this->service_request_neighborhood = $service_request_neighborhood;
		return $this;
	}

	public function getServiceRequestPhoneContact(): ?int {
		return $this->service_request_phone_contact;
	}

	public function setServiceRequestPhoneContact(?int $service_request_phone_contact): ServiceRequest {
		$this->service_request_phone_contact = $service_request_phone_contact;
		return $this;
	}

	public function getServiceRequestEmail(): ?string {
		return $this->service_request_email;
	}

	public function setServiceRequestEmail(?string $service_request_email): ServiceRequest {
		$this->service_request_email = $service_request_email;
		return $this;
	}

	public function getServiceRequestTroubleReport(): ?string {
		return $this->service_request_trouble_report;
	}

	public function setServiceRequestTroubleReport(?string $service_request_trouble_report): ServiceRequest {
		$this->service_request_trouble_report = $service_request_trouble_report;
		return $this;
	}

	public function getServiceRequestEvidence(): ?string {
		return $this->service_request_evidence;
	}

	public function setServiceRequestEvidence(?string $service_request_evidence): ServiceRequest {
		$this->service_request_evidence = $service_request_evidence;
		return $this;
	}

	public function getServiceRequestWarranty(): ?string {
		return $this->service_request_warranty;
	}

	public function setServiceRequestWarranty(?string $service_request_warranty): ServiceRequest {
		$this->service_request_warranty = $service_request_warranty;
		return $this;
	}

	public function getServiceRequestDateVisit(): ?string {
		return $this->service_request_date_visit;
	}

	public function setServiceRequestDateVisit(?string $service_request_date_visit): ServiceRequest {
		$this->service_request_date_visit = $service_request_date_visit;
		return $this;
	}

	public function getServiceRequestDateClose(): ?string {
		return $this->service_request_date_close;
	}

	public function setServiceRequestDateClose(?string $service_request_date_close): ServiceRequest {
		$this->service_request_date_close = $service_request_date_close;
		return $this;
	}

	public function getServiceRequestValue(): ?int {
		return $this->service_request_value;
	}

	public function setServiceRequestValue(?int $service_request_value): ServiceRequest {
		$this->service_request_value = $service_request_value;
		return $this;
	}

	public function getServiceRequestPaymentMethods(): ?string {
		return $this->service_request_payment_methods;
	}

	public function setServiceRequestPaymentMethods(?string $service_request_payment_methods): ServiceRequest {
		$this->service_request_payment_methods = $service_request_payment_methods;
		return $this;
	}

	public function getServiceRequestTechnicalNovelty(): ?string {
		return $this->service_request_technical_novelty;
	}

	public function setServiceRequestTechnicalNovelty(?string $service_request_technical_novelty): ServiceRequest {
		$this->service_request_technical_novelty = $service_request_technical_novelty;
		return $this;
	}

	public function getServiceRequestPaymentStatesCreationDate(): ?string {
		return $this->service_request_payment_states_creation_date;
	}

	public function setServiceRequestPaymentStatesCreationDate(?string $service_request_payment_states_creation_date): ServiceRequest {
		$this->service_request_payment_states_creation_date = $service_request_payment_states_creation_date;
		return $this;
	}

	public function getServiceRequestPaymentStates(): ?int {
		return $this->service_request_payment_states;
	}

	public function setServiceRequestPaymentStates(?int $service_request_payment_states): ServiceRequest {
		$this->service_request_payment_states = $service_request_payment_states;
		return $this;
	}

	public function getServiceRequestPaymentPaidCreationDate(): ?string {
		return $this->service_request_payment_paid_creation_date;
	}

	public function setServiceRequestPaymentPaidCreationDate(?string $service_request_payment_paid_creation_date): ServiceRequest {
		$this->service_request_payment_paid_creation_date = $service_request_payment_paid_creation_date;
		return $this;
	}

}