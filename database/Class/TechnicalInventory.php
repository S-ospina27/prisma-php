<?php

namespace Database\Class;

class TechnicalInventory implements \JsonSerializable {

	private ?int $idtechnical_inventory = null;
	private ?int $idusers = null;
	private ?int $idspare_parts = null;
	private ?int $technical_inventory_amount = null;
	private ?int $technical_inventory_quantity_used = null;
	private ?int $technical_inventory_quantity_available = null;
	private ?int $idservice_states = null;
	private ?string $technical_inventory_description = null;
	private ?string $technical_inventory_creation_date = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): TechnicalInventory {
		$technicalinventory = new TechnicalInventory();

		$technicalinventory->setIdtechnicalInventory(
			isset(request->idtechnical_inventory) ? (int) request->idtechnical_inventory : null
		);

		$technicalinventory->setIdusers(
			isset(request->idusers) ? (int) request->idusers : null
		);

		$technicalinventory->setIdspareParts(
			isset(request->idspare_parts) ? (int) request->idspare_parts : null
		);

		$technicalinventory->setTechnicalInventoryAmount(
			isset(request->technical_inventory_amount) ? (int) request->technical_inventory_amount : null
		);

		$technicalinventory->setTechnicalInventoryQuantityUsed(
			isset(request->technical_inventory_quantity_used) ? (int) request->technical_inventory_quantity_used : null
		);

		$technicalinventory->setTechnicalInventoryQuantityAvailable(
			isset(request->technical_inventory_quantity_available) ? (int) request->technical_inventory_quantity_available : null
		);

		$technicalinventory->setIdserviceStates(
			isset(request->idservice_states) ? (int) request->idservice_states : null
		);

		$technicalinventory->setTechnicalInventoryDescription(
			isset(request->technical_inventory_description) ? request->technical_inventory_description : null
		);

		$technicalinventory->setTechnicalInventoryCreationDate(
			isset(request->technical_inventory_creation_date) ? request->technical_inventory_creation_date : null
		);

		return $technicalinventory;
	}

	public function getIdtechnicalInventory(): ?int {
		return $this->idtechnical_inventory;
	}

	public function setIdtechnicalInventory(?int $idtechnical_inventory): TechnicalInventory {
		$this->idtechnical_inventory = $idtechnical_inventory;
		return $this;
	}

	public function getIdusers(): ?int {
		return $this->idusers;
	}

	public function setIdusers(?int $idusers): TechnicalInventory {
		$this->idusers = $idusers;
		return $this;
	}

	public function getIdspareParts(): ?int {
		return $this->idspare_parts;
	}

	public function setIdspareParts(?int $idspare_parts): TechnicalInventory {
		$this->idspare_parts = $idspare_parts;
		return $this;
	}

	public function getTechnicalInventoryAmount(): ?int {
		return $this->technical_inventory_amount;
	}

	public function setTechnicalInventoryAmount(?int $technical_inventory_amount): TechnicalInventory {
		$this->technical_inventory_amount = $technical_inventory_amount;
		return $this;
	}

	public function getTechnicalInventoryQuantityUsed(): ?int {
		return $this->technical_inventory_quantity_used;
	}

	public function setTechnicalInventoryQuantityUsed(?int $technical_inventory_quantity_used): TechnicalInventory {
		$this->technical_inventory_quantity_used = $technical_inventory_quantity_used;
		return $this;
	}

	public function getTechnicalInventoryQuantityAvailable(): ?int {
		return $this->technical_inventory_quantity_available;
	}

	public function setTechnicalInventoryQuantityAvailable(?int $technical_inventory_quantity_available): TechnicalInventory {
		$this->technical_inventory_quantity_available = $technical_inventory_quantity_available;
		return $this;
	}

	public function getIdserviceStates(): ?int {
		return $this->idservice_states;
	}

	public function setIdserviceStates(?int $idservice_states): TechnicalInventory {
		$this->idservice_states = $idservice_states;
		return $this;
	}

	public function getTechnicalInventoryDescription(): ?string {
		return $this->technical_inventory_description;
	}

	public function setTechnicalInventoryDescription(?string $technical_inventory_description): TechnicalInventory {
		$this->technical_inventory_description = $technical_inventory_description;
		return $this;
	}

	public function getTechnicalInventoryCreationDate(): ?string {
		return $this->technical_inventory_creation_date;
	}

	public function setTechnicalInventoryCreationDate(?string $technical_inventory_creation_date): TechnicalInventory {
		$this->technical_inventory_creation_date = $technical_inventory_creation_date;
		return $this;
	}

}