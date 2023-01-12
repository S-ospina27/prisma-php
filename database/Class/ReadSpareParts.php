<?php

namespace Database\Class;

class ReadSpareParts implements \JsonSerializable {

	private ?int $idspare_parts = null;
	private ?string $spare_parts_name = null;
	private ?int $spare_parts_amount = null;
	private ?int $spare_parts_digital_quantity = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadSpareParts {
		$readspareparts = new ReadSpareParts();

		$readspareparts->setIdspareParts(
			isset(request->idspare_parts) ? request->idspare_parts : null
		);

		$readspareparts->setSparePartsName(
			isset(request->spare_parts_name) ? request->spare_parts_name : null
		);

		$readspareparts->setSparePartsAmount(
			isset(request->spare_parts_amount) ? request->spare_parts_amount : null
		);

		$readspareparts->setSparePartsDigitalQuantity(
			isset(request->spare_parts_digital_quantity) ? request->spare_parts_digital_quantity : null
		);

		return $readspareparts;
	}

	public function getIdspareParts(): ?int {
		return $this->idspare_parts;
	}

	public function setIdspareParts(?int $idspare_parts): ReadSpareParts {
		$this->idspare_parts = $idspare_parts;
		return $this;
	}

	public function getSparePartsName(): ?string {
		return $this->spare_parts_name;
	}

	public function setSparePartsName(?string $spare_parts_name): ReadSpareParts {
		$this->spare_parts_name = $spare_parts_name;
		return $this;
	}

	public function getSparePartsAmount(): ?int {
		return $this->spare_parts_amount;
	}

	public function setSparePartsAmount(?int $spare_parts_amount): ReadSpareParts {
		$this->spare_parts_amount = $spare_parts_amount;
		return $this;
	}

	public function getSparePartsDigitalQuantity(): ?int {
		return $this->spare_parts_digital_quantity;
	}

	public function setSparePartsDigitalQuantity(?int $spare_parts_digital_quantity): ReadSpareParts {
		$this->spare_parts_digital_quantity = $spare_parts_digital_quantity;
		return $this;
	}

}