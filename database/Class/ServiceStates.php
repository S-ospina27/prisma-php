<?php

namespace Database\Class;

class ServiceStates implements \JsonSerializable {

	private ?int $idservice_states = null;
	private ?string $service_type = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ServiceStates {
		$servicestates = new ServiceStates();

		$servicestates->setIdserviceStates(
			isset(request->idservice_states) ? (int) request->idservice_states : null
		);

		$servicestates->setServiceType(
			isset(request->service_type) ? request->service_type : null
		);

		return $servicestates;
	}

	public function getIdserviceStates(): ?int {
		return $this->idservice_states;
	}

	public function setIdserviceStates(?int $idservice_states): ServiceStates {
		$this->idservice_states = $idservice_states;
		return $this;
	}

	public function getServiceType(): ?string {
		return $this->service_type;
	}

	public function setServiceType(?string $service_type): ServiceStates {
		$this->service_type = $service_type;
		return $this;
	}

}