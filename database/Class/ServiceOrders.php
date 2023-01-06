<?php

namespace Database\Class;

class ServiceOrders implements \JsonSerializable {

	private ?int $idservice_orders = null;
	private ?int $idproducts = null;
	private ?int $idservice_states = null;
	private ?int $idusers = null;
	private ?string $service_orders_creation_date = null;
	private ?string $service_orders_date_delivery = null;
	private ?string $service_orders_finished_product = null;
	private ?string $service_orders_type = null;
	private ?string $service_orders_consecutive = null;
	private ?int $service_orders_amount = null;
	private ?int $service_orders_not_defective_amount = null;
	private ?int $service_orders_defective_amount = null;
	private ?string $service_orders_observation = null;
	private ?int $service_orders_total_price = null;
	private ?int $service_orders_pending_amount = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ServiceOrders {
		$serviceorders = new ServiceOrders();

		$serviceorders->setIdserviceOrders(
			isset(request->idservice_orders) ? request->idservice_orders : null
		);

		$serviceorders->setIdproducts(
			isset(request->idproducts) ? request->idproducts : null
		);

		$serviceorders->setIdserviceStates(
			isset(request->idservice_states) ? request->idservice_states : null
		);

		$serviceorders->setIdusers(
			isset(request->idusers) ? request->idusers : null
		);

		$serviceorders->setServiceOrdersCreationDate(
			isset(request->service_orders_creation_date) ? request->service_orders_creation_date : null
		);

		$serviceorders->setServiceOrdersDateDelivery(
			isset(request->service_orders_date_delivery) ? request->service_orders_date_delivery : null
		);

		$serviceorders->setServiceOrdersFinishedProduct(
			isset(request->service_orders_finished_product) ? request->service_orders_finished_product : null
		);

		$serviceorders->setServiceOrdersType(
			isset(request->service_orders_type) ? request->service_orders_type : null
		);

		$serviceorders->setServiceOrdersConsecutive(
			isset(request->service_orders_consecutive) ? request->service_orders_consecutive : null
		);

		$serviceorders->setServiceOrdersAmount(
			isset(request->service_orders_amount) ? request->service_orders_amount : null
		);

		$serviceorders->setServiceOrdersNotDefectiveAmount(
			isset(request->service_orders_not_defective_amount) ? request->service_orders_not_defective_amount : null
		);

		$serviceorders->setServiceOrdersDefectiveAmount(
			isset(request->service_orders_defective_amount) ? request->service_orders_defective_amount : null
		);

		$serviceorders->setServiceOrdersObservation(
			isset(request->service_orders_observation) ? request->service_orders_observation : null
		);

		$serviceorders->setServiceOrdersTotalPrice(
			isset(request->service_orders_total_price) ? request->service_orders_total_price : null
		);

		$serviceorders->setServiceOrdersPendingAmount(
			isset(request->service_orders_pending_amount) ? request->service_orders_pending_amount : null
		);

		return $serviceorders;
	}

	public function getIdserviceOrders(): ?int {
		return $this->idservice_orders;
	}

	public function setIdserviceOrders(?int $idservice_orders): ServiceOrders {
		$this->idservice_orders = $idservice_orders;
		return $this;
	}

	public function getIdproducts(): ?int {
		return $this->idproducts;
	}

	public function setIdproducts(?int $idproducts): ServiceOrders {
		$this->idproducts = $idproducts;
		return $this;
	}

	public function getIdserviceStates(): ?int {
		return $this->idservice_states;
	}

	public function setIdserviceStates(?int $idservice_states): ServiceOrders {
		$this->idservice_states = $idservice_states;
		return $this;
	}

	public function getIdusers(): ?int {
		return $this->idusers;
	}

	public function setIdusers(?int $idusers): ServiceOrders {
		$this->idusers = $idusers;
		return $this;
	}

	public function getServiceOrdersCreationDate(): ?string {
		return $this->service_orders_creation_date;
	}

	public function setServiceOrdersCreationDate(?string $service_orders_creation_date): ServiceOrders {
		$this->service_orders_creation_date = $service_orders_creation_date;
		return $this;
	}

	public function getServiceOrdersDateDelivery(): ?string {
		return $this->service_orders_date_delivery;
	}

	public function setServiceOrdersDateDelivery(?string $service_orders_date_delivery): ServiceOrders {
		$this->service_orders_date_delivery = $service_orders_date_delivery;
		return $this;
	}

	public function getServiceOrdersFinishedProduct(): ?string {
		return $this->service_orders_finished_product;
	}

	public function setServiceOrdersFinishedProduct(?string $service_orders_finished_product): ServiceOrders {
		$this->service_orders_finished_product = $service_orders_finished_product;
		return $this;
	}

	public function getServiceOrdersType(): ?string {
		return $this->service_orders_type;
	}

	public function setServiceOrdersType(?string $service_orders_type): ServiceOrders {
		$this->service_orders_type = $service_orders_type;
		return $this;
	}

	public function getServiceOrdersConsecutive(): ?string {
		return $this->service_orders_consecutive;
	}

	public function setServiceOrdersConsecutive(?string $service_orders_consecutive): ServiceOrders {
		$this->service_orders_consecutive = $service_orders_consecutive;
		return $this;
	}

	public function getServiceOrdersAmount(): ?int {
		return $this->service_orders_amount;
	}

	public function setServiceOrdersAmount(?int $service_orders_amount): ServiceOrders {
		$this->service_orders_amount = $service_orders_amount;
		return $this;
	}

	public function getServiceOrdersNotDefectiveAmount(): ?int {
		return $this->service_orders_not_defective_amount;
	}

	public function setServiceOrdersNotDefectiveAmount(?int $service_orders_not_defective_amount): ServiceOrders {
		$this->service_orders_not_defective_amount = $service_orders_not_defective_amount;
		return $this;
	}

	public function getServiceOrdersDefectiveAmount(): ?int {
		return $this->service_orders_defective_amount;
	}

	public function setServiceOrdersDefectiveAmount(?int $service_orders_defective_amount): ServiceOrders {
		$this->service_orders_defective_amount = $service_orders_defective_amount;
		return $this;
	}

	public function getServiceOrdersObservation(): ?string {
		return $this->service_orders_observation;
	}

	public function setServiceOrdersObservation(?string $service_orders_observation): ServiceOrders {
		$this->service_orders_observation = $service_orders_observation;
		return $this;
	}

	public function getServiceOrdersTotalPrice(): ?int {
		return $this->service_orders_total_price;
	}

	public function setServiceOrdersTotalPrice(?int $service_orders_total_price): ServiceOrders {
		$this->service_orders_total_price = $service_orders_total_price;
		return $this;
	}

	public function getServiceOrdersPendingAmount(): ?int {
		return $this->service_orders_pending_amount;
	}

	public function setServiceOrdersPendingAmount(?int $service_orders_pending_amount): ServiceOrders {
		$this->service_orders_pending_amount = $service_orders_pending_amount;
		return $this;
	}

}