<?php

namespace Database\Class;

class ReadPayments implements \JsonSerializable {

	private ?int $idpayments = null;
	private ?int $idservice_request = null;
	private ?string $guide = null;
	private ?int $idservice_states = null;
	private ?string $service_type = null;
	private ?int $payments_value = null;
	private ?string $payments_creation_date = null;
	private ?string $payments_update_date = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadPayments {
		$readpayments = new ReadPayments();

		$readpayments->setIdpayments(
			isset(request->idpayments) ? request->idpayments : null
		);

		$readpayments->setIdserviceRequest(
			isset(request->idservice_request) ? request->idservice_request : null
		);

		$readpayments->setGuide(
			isset(request->guide) ? request->guide : null
		);

		$readpayments->setIdserviceStates(
			isset(request->idservice_states) ? request->idservice_states : null
		);

		$readpayments->setServiceType(
			isset(request->service_type) ? request->service_type : null
		);

		$readpayments->setPaymentsValue(
			isset(request->payments_value) ? request->payments_value : null
		);

		$readpayments->setPaymentsCreationDate(
			isset(request->payments_creation_date) ? request->payments_creation_date : null
		);

		$readpayments->setPaymentsUpdateDate(
			isset(request->payments_update_date) ? request->payments_update_date : null
		);

		return $readpayments;
	}

	public function getIdpayments(): ?int {
		return $this->idpayments;
	}

	public function setIdpayments(?int $idpayments): ReadPayments {
		$this->idpayments = $idpayments;
		return $this;
	}

	public function getIdserviceRequest(): ?int {
		return $this->idservice_request;
	}

	public function setIdserviceRequest(?int $idservice_request): ReadPayments {
		$this->idservice_request = $idservice_request;
		return $this;
	}

	public function getGuide(): ?string {
		return $this->guide;
	}

	public function setGuide(?string $guide): ReadPayments {
		$this->guide = $guide;
		return $this;
	}

	public function getIdserviceStates(): ?int {
		return $this->idservice_states;
	}

	public function setIdserviceStates(?int $idservice_states): ReadPayments {
		$this->idservice_states = $idservice_states;
		return $this;
	}

	public function getServiceType(): ?string {
		return $this->service_type;
	}

	public function setServiceType(?string $service_type): ReadPayments {
		$this->service_type = $service_type;
		return $this;
	}

	public function getPaymentsValue(): ?int {
		return $this->payments_value;
	}

	public function setPaymentsValue(?int $payments_value): ReadPayments {
		$this->payments_value = $payments_value;
		return $this;
	}

	public function getPaymentsCreationDate(): ?string {
		return $this->payments_creation_date;
	}

	public function setPaymentsCreationDate(?string $payments_creation_date): ReadPayments {
		$this->payments_creation_date = $payments_creation_date;
		return $this;
	}

	public function getPaymentsUpdateDate(): ?string {
		return $this->payments_update_date;
	}

	public function setPaymentsUpdateDate(?string $payments_update_date): ReadPayments {
		$this->payments_update_date = $payments_update_date;
		return $this;
	}

}