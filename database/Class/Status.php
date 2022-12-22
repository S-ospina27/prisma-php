<?php

namespace Database\Class;

class Status implements \JsonSerializable {

	private ?int $idstatus = null;
	private ?string $status_type = null;

	public function __construct() {}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): Status {
		$status = new Status();

		$status->setIdstatus(
			isset(request->idstatus) ? request->idstatus : null
		);

		$status->setStatusType(
			isset(request->status_type) ? request->status_type : null
		);

		return $status;
	}

	public function getIdstatus(): ?int {
		return $this->idstatus;
	}

	public function setIdstatus(?int $idstatus): Status {
		$this->idstatus = $idstatus;
		return $this;
	}

	public function getStatusType(): ?string {
		return $this->status_type;
	}

	public function setStatusType(?string $status_type): Status {
		$this->status_type = $status_type;
		return $this;
	}

}