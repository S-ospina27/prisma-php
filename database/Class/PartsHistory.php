<?php

namespace Database\Class;

class PartsHistory implements \JsonSerializable {

	private ?int $idparts_history = null;
	private ?int $idservice_request = null;
	private ?int $idspare_parts = null;
	private ?int $parts_history_digital_quantity = null;
	private ?string $parts_history_creation_date = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): PartsHistory {
		$partshistory = new PartsHistory();

		$partshistory->setIdpartsHistory(
			isset(request->idparts_history) ? request->idparts_history : null
		);

		$partshistory->setIdserviceRequest(
			isset(request->idservice_request) ? request->idservice_request : null
		);

		$partshistory->setIdspareParts(
			isset(request->idspare_parts) ? request->idspare_parts : null
		);

		$partshistory->setPartsHistoryDigitalQuantity(
			isset(request->parts_history_digital_quantity) ? request->parts_history_digital_quantity : null
		);

		$partshistory->setPartsHistoryCreationDate(
			isset(request->parts_history_creation_date) ? request->parts_history_creation_date : null
		);

		return $partshistory;
	}

	public function getIdpartsHistory(): ?int {
		return $this->idparts_history;
	}

	public function setIdpartsHistory(?int $idparts_history): PartsHistory {
		$this->idparts_history = $idparts_history;
		return $this;
	}

	public function getIdserviceRequest(): ?int {
		return $this->idservice_request;
	}

	public function setIdserviceRequest(?int $idservice_request): PartsHistory {
		$this->idservice_request = $idservice_request;
		return $this;
	}

	public function getIdspareParts(): ?int {
		return $this->idspare_parts;
	}

	public function setIdspareParts(?int $idspare_parts): PartsHistory {
		$this->idspare_parts = $idspare_parts;
		return $this;
	}

	public function getPartsHistoryDigitalQuantity(): ?int {
		return $this->parts_history_digital_quantity;
	}

	public function setPartsHistoryDigitalQuantity(?int $parts_history_digital_quantity): PartsHistory {
		$this->parts_history_digital_quantity = $parts_history_digital_quantity;
		return $this;
	}

	public function getPartsHistoryCreationDate(): ?string {
		return $this->parts_history_creation_date;
	}

	public function setPartsHistoryCreationDate(?string $parts_history_creation_date): PartsHistory {
		$this->parts_history_creation_date = $parts_history_creation_date;
		return $this;
	}

}