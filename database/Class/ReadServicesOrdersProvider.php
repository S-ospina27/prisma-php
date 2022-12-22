<?php

namespace Database\Class;

class ReadServicesOrdersProvider implements \JsonSerializable {

	private ?string $service_type = null;
	private ?int $idproducts = null;
	private ?int $idprovider_users = null;
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

	public function __construct() {}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadServicesOrdersProvider {
		$readservicesordersprovider = new ReadServicesOrdersProvider();

		$readservicesordersprovider->setServiceType(
			isset(request->service_type) ? request->service_type : null
		);

		$readservicesordersprovider->setIdproducts(
			isset(request->idproducts) ? request->idproducts : null
		);

		$readservicesordersprovider->setIdproviderUsers(
			isset(request->idprovider_users) ? request->idprovider_users : null
		);

		$readservicesordersprovider->setServiceOrdersCreationDate(
			isset(request->service_orders_creation_date) ? request->service_orders_creation_date : null
		);

		$readservicesordersprovider->setServiceOrdersDateDelivery(
			isset(request->service_orders_date_delivery) ? request->service_orders_date_delivery : null
		);

		$readservicesordersprovider->setServiceOrdersFinishedProduct(
			isset(request->service_orders_finished_product) ? request->service_orders_finished_product : null
		);

		$readservicesordersprovider->setServiceOrdersType(
			isset(request->service_orders_type) ? request->service_orders_type : null
		);

		$readservicesordersprovider->setServiceOrdersConsecutive(
			isset(request->service_orders_consecutive) ? request->service_orders_consecutive : null
		);

		$readservicesordersprovider->setServiceOrdersAmount(
			isset(request->service_orders_amount) ? request->service_orders_amount : null
		);

		$readservicesordersprovider->setServiceOrdersNotDefectiveAmount(
			isset(request->service_orders_not_defective_amount) ? request->service_orders_not_defective_amount : null
		);

		$readservicesordersprovider->setServiceOrdersDefectiveAmount(
			isset(request->service_orders_defective_amount) ? request->service_orders_defective_amount : null
		);

		$readservicesordersprovider->setServiceOrdersObservation(
			isset(request->service_orders_observation) ? request->service_orders_observation : null
		);

		$readservicesordersprovider->setServiceOrdersTotalPrice(
			isset(request->service_orders_total_price) ? request->service_orders_total_price : null
		);

		$readservicesordersprovider->setServiceOrdersPendingAmount(
			isset(request->service_orders_pending_amount) ? request->service_orders_pending_amount : null
		);

		return $readservicesordersprovider;
	}

	public function getServiceType(): ?string {
		return $this->service_type;
	}

	public function setServiceType(?string $service_type): ReadServicesOrdersProvider {
		$this->service_type = $service_type;
		return $this;
	}

	public function getIdproducts(): ?int {
		return $this->idproducts;
	}

	public function setIdproducts(?int $idproducts): ReadServicesOrdersProvider {
		$this->idproducts = $idproducts;
		return $this;
	}

	public function getIdproviderUsers(): ?int {
		return $this->idprovider_users;
	}

	public function setIdproviderUsers(?int $idprovider_users): ReadServicesOrdersProvider {
		$this->idprovider_users = $idprovider_users;
		return $this;
	}

	public function getServiceOrdersCreationDate(): ?string {
		return $this->service_orders_creation_date;
	}

	public function setServiceOrdersCreationDate(?string $service_orders_creation_date): ReadServicesOrdersProvider {
		$this->service_orders_creation_date = $service_orders_creation_date;
		return $this;
	}

	public function getServiceOrdersDateDelivery(): ?string {
		return $this->service_orders_date_delivery;
	}

	public function setServiceOrdersDateDelivery(?string $service_orders_date_delivery): ReadServicesOrdersProvider {
		$this->service_orders_date_delivery = $service_orders_date_delivery;
		return $this;
	}

	public function getServiceOrdersFinishedProduct(): ?string {
		return $this->service_orders_finished_product;
	}

	public function setServiceOrdersFinishedProduct(?string $service_orders_finished_product): ReadServicesOrdersProvider {
		$this->service_orders_finished_product = $service_orders_finished_product;
		return $this;
	}

	public function getServiceOrdersType(): ?string {
		return $this->service_orders_type;
	}

	public function setServiceOrdersType(?string $service_orders_type): ReadServicesOrdersProvider {
		$this->service_orders_type = $service_orders_type;
		return $this;
	}

	public function getServiceOrdersConsecutive(): ?string {
		return $this->service_orders_consecutive;
	}

	public function setServiceOrdersConsecutive(?string $service_orders_consecutive): ReadServicesOrdersProvider {
		$this->service_orders_consecutive = $service_orders_consecutive;
		return $this;
	}

	public function getServiceOrdersAmount(): ?int {
		return $this->service_orders_amount;
	}

	public function setServiceOrdersAmount(?int $service_orders_amount): ReadServicesOrdersProvider {
		$this->service_orders_amount = $service_orders_amount;
		return $this;
	}

	public function getServiceOrdersNotDefectiveAmount(): ?int {
		return $this->service_orders_not_defective_amount;
	}

	public function setServiceOrdersNotDefectiveAmount(?int $service_orders_not_defective_amount): ReadServicesOrdersProvider {
		$this->service_orders_not_defective_amount = $service_orders_not_defective_amount;
		return $this;
	}

	public function getServiceOrdersDefectiveAmount(): ?int {
		return $this->service_orders_defective_amount;
	}

	public function setServiceOrdersDefectiveAmount(?int $service_orders_defective_amount): ReadServicesOrdersProvider {
		$this->service_orders_defective_amount = $service_orders_defective_amount;
		return $this;
	}

	public function getServiceOrdersObservation(): ?string {
		return $this->service_orders_observation;
	}

	public function setServiceOrdersObservation(?string $service_orders_observation): ReadServicesOrdersProvider {
		$this->service_orders_observation = $service_orders_observation;
		return $this;
	}

	public function getServiceOrdersTotalPrice(): ?int {
		return $this->service_orders_total_price;
	}

	public function setServiceOrdersTotalPrice(?int $service_orders_total_price): ReadServicesOrdersProvider {
		$this->service_orders_total_price = $service_orders_total_price;
		return $this;
	}

	public function getServiceOrdersPendingAmount(): ?int {
		return $this->service_orders_pending_amount;
	}

	public function setServiceOrdersPendingAmount(?int $service_orders_pending_amount): ReadServicesOrdersProvider {
		$this->service_orders_pending_amount = $service_orders_pending_amount;
		return $this;
	}

}