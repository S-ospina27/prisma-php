<?php

namespace Database\Class;

class Payments implements \JsonSerializable {

	private ?int $idpayments = null;
	private ?int $idservice_request = null;
	private ?int $idservice_states = null;
	private ?int $payments_value = null;
	private ?string $payments_creation_date = null;
	private ?string $payments_update_date = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): Payments {
		$payments = new Payments();

		$payments->setIdpayments(
			isset(request->idpayments) ? (int) request->idpayments : null
		);

		$payments->setIdserviceRequest(
			isset(request->idservice_request) ? (int) request->idservice_request : null
		);

		$payments->setIdserviceStates(
			isset(request->idservice_states) ? (int) request->idservice_states : null
		);

		$payments->setPaymentsValue(
			isset(request->payments_value) ? (int) request->payments_value : null
		);

		$payments->setPaymentsCreationDate(
			isset(request->payments_creation_date) ? request->payments_creation_date : null
		);

		$payments->setPaymentsUpdateDate(
			isset(request->payments_update_date) ? request->payments_update_date : null
		);

		return $payments;
	}

	public function getIdpayments(): ?int {
		return $this->idpayments;
	}

	public function setIdpayments(?int $idpayments): Payments {
		$this->idpayments = $idpayments;
		return $this;
	}

	public function getIdserviceRequest(): ?int {
		return $this->idservice_request;
	}

	public function setIdserviceRequest(?int $idservice_request): Payments {
		$this->idservice_request = $idservice_request;
		return $this;
	}

	public function getIdserviceStates(): ?int {
		return $this->idservice_states;
	}

	public function setIdserviceStates(?int $idservice_states): Payments {
		$this->idservice_states = $idservice_states;
		return $this;
	}

	public function getPaymentsValue(): ?int {
		return $this->payments_value;
	}

	public function setPaymentsValue(?int $payments_value): Payments {
		$this->payments_value = $payments_value;
		return $this;
	}

	public function getPaymentsCreationDate(): ?string {
		return $this->payments_creation_date;
	}

	public function setPaymentsCreationDate(?string $payments_creation_date): Payments {
		$this->payments_creation_date = $payments_creation_date;
		return $this;
	}

	public function getPaymentsUpdateDate(): ?string {
		return $this->payments_update_date;
	}

	public function setPaymentsUpdateDate(?string $payments_update_date): Payments {
		$this->payments_update_date = $payments_update_date;
		return $this;
	}

}