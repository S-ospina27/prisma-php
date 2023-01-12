<?php

namespace Database\Class;

class RequestServicesHistory implements \JsonSerializable {

	private ?int $idrequest_services_history = null;
	private ?int $idservice_request = null;
	private ?int $idusers = null;
	private ?int $request_services_history_amount_used = null;
	private ?string $request_services_history_creation_date = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): RequestServicesHistory {
		$requestserviceshistory = new RequestServicesHistory();

		$requestserviceshistory->setIdrequestServicesHistory(
			isset(request->idrequest_services_history) ? request->idrequest_services_history : null
		);

		$requestserviceshistory->setIdserviceRequest(
			isset(request->idservice_request) ? request->idservice_request : null
		);

		$requestserviceshistory->setIdusers(
			isset(request->idusers) ? request->idusers : null
		);

		$requestserviceshistory->setRequestServicesHistoryAmountUsed(
			isset(request->request_services_history_amount_used) ? request->request_services_history_amount_used : null
		);

		$requestserviceshistory->setRequestServicesHistoryCreationDate(
			isset(request->request_services_history_creation_date) ? request->request_services_history_creation_date : null
		);

		return $requestserviceshistory;
	}

	public function getIdrequestServicesHistory(): ?int {
		return $this->idrequest_services_history;
	}

	public function setIdrequestServicesHistory(?int $idrequest_services_history): RequestServicesHistory {
		$this->idrequest_services_history = $idrequest_services_history;
		return $this;
	}

	public function getIdserviceRequest(): ?int {
		return $this->idservice_request;
	}

	public function setIdserviceRequest(?int $idservice_request): RequestServicesHistory {
		$this->idservice_request = $idservice_request;
		return $this;
	}

	public function getIdusers(): ?int {
		return $this->idusers;
	}

	public function setIdusers(?int $idusers): RequestServicesHistory {
		$this->idusers = $idusers;
		return $this;
	}

	public function getRequestServicesHistoryAmountUsed(): ?int {
		return $this->request_services_history_amount_used;
	}

	public function setRequestServicesHistoryAmountUsed(?int $request_services_history_amount_used): RequestServicesHistory {
		$this->request_services_history_amount_used = $request_services_history_amount_used;
		return $this;
	}

	public function getRequestServicesHistoryCreationDate(): ?string {
		return $this->request_services_history_creation_date;
	}

	public function setRequestServicesHistoryCreationDate(?string $request_services_history_creation_date): RequestServicesHistory {
		$this->request_services_history_creation_date = $request_services_history_creation_date;
		return $this;
	}

}