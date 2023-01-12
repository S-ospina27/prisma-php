<?php

namespace Database\Class;

class SpareParts implements \JsonSerializable {

	private ?int $idspare_parts = null;
	private ?string $spare_parts_name = null;
	private ?int $spare_parts_amount = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): SpareParts {
		$spareparts = new SpareParts();

		$spareparts->setIdspareParts(
			isset(request->idspare_parts) ? (int) request->idspare_parts : null
		);

		$spareparts->setSparePartsName(
			isset(request->spare_parts_name) ? request->spare_parts_name : null
		);

		$spareparts->setSparePartsAmount(
			isset(request->spare_parts_amount) ? (int) request->spare_parts_amount : null
		);

		return $spareparts;
	}

	public function getIdspareParts(): ?int {
		return $this->idspare_parts;
	}

	public function setIdspareParts(?int $idspare_parts): SpareParts {
		$this->idspare_parts = $idspare_parts;
		return $this;
	}

	public function getSparePartsName(): ?string {
		return $this->spare_parts_name;
	}

	public function setSparePartsName(?string $spare_parts_name): SpareParts {
		$this->spare_parts_name = $spare_parts_name;
		return $this;
	}

	public function getSparePartsAmount(): ?int {
		return $this->spare_parts_amount;
	}

	public function setSparePartsAmount(?int $spare_parts_amount): SpareParts {
		$this->spare_parts_amount = $spare_parts_amount;
		return $this;
	}

}