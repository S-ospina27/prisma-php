<?php

namespace Database\Class;

class ReadTechnicalInventory implements \JsonSerializable {

	private ?int $idtechnical_inventory = null;
	private ?int $idusers = null;
	private ?string $fullname = null;
	private ?int $idspare_parts = null;
	private ?string $spare_parts_name = null;
	private ?int $technical_inventory_amount = null;
	private ?int $technical_inventory_quantity_used = null;
	private ?int $technical_inventory_quantity_available = null;
	private ?int $idservice_states = null;
	private ?string $service_type = null;
	private ?string $technical_inventory_description = null;
	private ?string $technical_inventory_creation_date = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadTechnicalInventory {
		$readtechnicalinventory = new ReadTechnicalInventory();

		$readtechnicalinventory->setIdtechnicalInventory(
			isset(request->idtechnical_inventory) ? request->idtechnical_inventory : null
		);

		$readtechnicalinventory->setIdusers(
			isset(request->idusers) ? request->idusers : null
		);

		$readtechnicalinventory->setFullname(
			isset(request->fullname) ? request->fullname : null
		);

		$readtechnicalinventory->setIdspareParts(
			isset(request->idspare_parts) ? request->idspare_parts : null
		);

		$readtechnicalinventory->setSparePartsName(
			isset(request->spare_parts_name) ? request->spare_parts_name : null
		);

		$readtechnicalinventory->setTechnicalInventoryAmount(
			isset(request->technical_inventory_amount) ? request->technical_inventory_amount : null
		);

		$readtechnicalinventory->setTechnicalInventoryQuantityUsed(
			isset(request->technical_inventory_quantity_used) ? request->technical_inventory_quantity_used : null
		);

		$readtechnicalinventory->setTechnicalInventoryQuantityAvailable(
			isset(request->technical_inventory_quantity_available) ? request->technical_inventory_quantity_available : null
		);

		$readtechnicalinventory->setIdserviceStates(
			isset(request->idservice_states) ? request->idservice_states : null
		);

		$readtechnicalinventory->setServiceType(
			isset(request->service_type) ? request->service_type : null
		);

		$readtechnicalinventory->setTechnicalInventoryDescription(
			isset(request->technical_inventory_description) ? request->technical_inventory_description : null
		);

		$readtechnicalinventory->setTechnicalInventoryCreationDate(
			isset(request->technical_inventory_creation_date) ? request->technical_inventory_creation_date : null
		);

		return $readtechnicalinventory;
	}

	public function getIdtechnicalInventory(): ?int {
		return $this->idtechnical_inventory;
	}

	public function setIdtechnicalInventory(?int $idtechnical_inventory): ReadTechnicalInventory {
		$this->idtechnical_inventory = $idtechnical_inventory;
		return $this;
	}

	public function getIdusers(): ?int {
		return $this->idusers;
	}

	public function setIdusers(?int $idusers): ReadTechnicalInventory {
		$this->idusers = $idusers;
		return $this;
	}

	public function getFullname(): ?string {
		return $this->fullname;
	}

	public function setFullname(?string $fullname): ReadTechnicalInventory {
		$this->fullname = $fullname;
		return $this;
	}

	public function getIdspareParts(): ?int {
		return $this->idspare_parts;
	}

	public function setIdspareParts(?int $idspare_parts): ReadTechnicalInventory {
		$this->idspare_parts = $idspare_parts;
		return $this;
	}

	public function getSparePartsName(): ?string {
		return $this->spare_parts_name;
	}

	public function setSparePartsName(?string $spare_parts_name): ReadTechnicalInventory {
		$this->spare_parts_name = $spare_parts_name;
		return $this;
	}

	public function getTechnicalInventoryAmount(): ?int {
		return $this->technical_inventory_amount;
	}

	public function setTechnicalInventoryAmount(?int $technical_inventory_amount): ReadTechnicalInventory {
		$this->technical_inventory_amount = $technical_inventory_amount;
		return $this;
	}

	public function getTechnicalInventoryQuantityUsed(): ?int {
		return $this->technical_inventory_quantity_used;
	}

	public function setTechnicalInventoryQuantityUsed(?int $technical_inventory_quantity_used): ReadTechnicalInventory {
		$this->technical_inventory_quantity_used = $technical_inventory_quantity_used;
		return $this;
	}

	public function getTechnicalInventoryQuantityAvailable(): ?int {
		return $this->technical_inventory_quantity_available;
	}

	public function setTechnicalInventoryQuantityAvailable(?int $technical_inventory_quantity_available): ReadTechnicalInventory {
		$this->technical_inventory_quantity_available = $technical_inventory_quantity_available;
		return $this;
	}

	public function getIdserviceStates(): ?int {
		return $this->idservice_states;
	}

	public function setIdserviceStates(?int $idservice_states): ReadTechnicalInventory {
		$this->idservice_states = $idservice_states;
		return $this;
	}

	public function getServiceType(): ?string {
		return $this->service_type;
	}

	public function setServiceType(?string $service_type): ReadTechnicalInventory {
		$this->service_type = $service_type;
		return $this;
	}

	public function getTechnicalInventoryDescription(): ?string {
		return $this->technical_inventory_description;
	}

	public function setTechnicalInventoryDescription(?string $technical_inventory_description): ReadTechnicalInventory {
		$this->technical_inventory_description = $technical_inventory_description;
		return $this;
	}

	public function getTechnicalInventoryCreationDate(): ?string {
		return $this->technical_inventory_creation_date;
	}

	public function setTechnicalInventoryCreationDate(?string $technical_inventory_creation_date): ReadTechnicalInventory {
		$this->technical_inventory_creation_date = $technical_inventory_creation_date;
		return $this;
	}

}