<?php

namespace Database\Class;

class ReadServiceOrders implements \JsonSerializable {

	private ?int $idservice_orders = null;
	private ?int $idusers = null;
	private ?string $fullname = null;
	private ?string $users_name = null;
	private ?string $users_lastname = null;
	private ?string $users_identification = null;
	private ?string $users_address = null;
	private ?int $users_phone = null;
	private ?string $users_email = null;
	private ?int $iddocument_types = null;
	private ?string $document_types_name = null;
	private ?int $idservice_states = null;
	private ?int $idproducts = null;
	private ?string $service_orders_creation_date = null;
	private ?string $service_orders_date_delivery = null;
	private ?string $service_orders_finished_product = null;
	private ?string $service_orders_type = null;
	private ?string $service_orders_consecutive = null;
	private ?string $full_consecutive = null;
	private ?int $service_orders_amount = null;
	private ?int $service_orders_not_defective_amount = null;
	private ?int $service_orders_defective_amount = null;
	private ?string $service_orders_observation = null;
	private ?int $service_orders_total_price = null;
	private ?int $service_orders_pending_amount = null;
	private ?string $service_orders_code = null;
	private ?string $service_type = null;
	private ?string $products_reference = null;
	private ?string $products_description = null;
	private ?string $product_types_name = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadServiceOrders {
		$readserviceorders = new ReadServiceOrders();

		$readserviceorders->setIdserviceOrders(
			isset(request->idservice_orders) ? request->idservice_orders : null
		);

		$readserviceorders->setIdusers(
			isset(request->idusers) ? request->idusers : null
		);

		$readserviceorders->setFullname(
			isset(request->fullname) ? request->fullname : null
		);

		$readserviceorders->setUsersName(
			isset(request->users_name) ? request->users_name : null
		);

		$readserviceorders->setUsersLastname(
			isset(request->users_lastname) ? request->users_lastname : null
		);

		$readserviceorders->setUsersIdentification(
			isset(request->users_identification) ? request->users_identification : null
		);

		$readserviceorders->setUsersAddress(
			isset(request->users_address) ? request->users_address : null
		);

		$readserviceorders->setUsersPhone(
			isset(request->users_phone) ? request->users_phone : null
		);

		$readserviceorders->setUsersEmail(
			isset(request->users_email) ? request->users_email : null
		);

		$readserviceorders->setIddocumentTypes(
			isset(request->iddocument_types) ? request->iddocument_types : null
		);

		$readserviceorders->setDocumentTypesName(
			isset(request->document_types_name) ? request->document_types_name : null
		);

		$readserviceorders->setIdserviceStates(
			isset(request->idservice_states) ? request->idservice_states : null
		);

		$readserviceorders->setIdproducts(
			isset(request->idproducts) ? request->idproducts : null
		);

		$readserviceorders->setServiceOrdersCreationDate(
			isset(request->service_orders_creation_date) ? request->service_orders_creation_date : null
		);

		$readserviceorders->setServiceOrdersDateDelivery(
			isset(request->service_orders_date_delivery) ? request->service_orders_date_delivery : null
		);

		$readserviceorders->setServiceOrdersFinishedProduct(
			isset(request->service_orders_finished_product) ? request->service_orders_finished_product : null
		);

		$readserviceorders->setServiceOrdersType(
			isset(request->service_orders_type) ? request->service_orders_type : null
		);

		$readserviceorders->setServiceOrdersConsecutive(
			isset(request->service_orders_consecutive) ? request->service_orders_consecutive : null
		);

		$readserviceorders->setFullConsecutive(
			isset(request->full_consecutive) ? request->full_consecutive : null
		);

		$readserviceorders->setServiceOrdersAmount(
			isset(request->service_orders_amount) ? request->service_orders_amount : null
		);

		$readserviceorders->setServiceOrdersNotDefectiveAmount(
			isset(request->service_orders_not_defective_amount) ? request->service_orders_not_defective_amount : null
		);

		$readserviceorders->setServiceOrdersDefectiveAmount(
			isset(request->service_orders_defective_amount) ? request->service_orders_defective_amount : null
		);

		$readserviceorders->setServiceOrdersObservation(
			isset(request->service_orders_observation) ? request->service_orders_observation : null
		);

		$readserviceorders->setServiceOrdersTotalPrice(
			isset(request->service_orders_total_price) ? request->service_orders_total_price : null
		);

		$readserviceorders->setServiceOrdersPendingAmount(
			isset(request->service_orders_pending_amount) ? request->service_orders_pending_amount : null
		);

		$readserviceorders->setServiceOrdersCode(
			isset(request->service_orders_code) ? request->service_orders_code : null
		);

		$readserviceorders->setServiceType(
			isset(request->service_type) ? request->service_type : null
		);

		$readserviceorders->setProductsReference(
			isset(request->products_reference) ? request->products_reference : null
		);

		$readserviceorders->setProductsDescription(
			isset(request->products_description) ? request->products_description : null
		);

		$readserviceorders->setProductTypesName(
			isset(request->product_types_name) ? request->product_types_name : null
		);

		return $readserviceorders;
	}

	public function getIdserviceOrders(): ?int {
		return $this->idservice_orders;
	}

	public function setIdserviceOrders(?int $idservice_orders): ReadServiceOrders {
		$this->idservice_orders = $idservice_orders;
		return $this;
	}

	public function getIdusers(): ?int {
		return $this->idusers;
	}

	public function setIdusers(?int $idusers): ReadServiceOrders {
		$this->idusers = $idusers;
		return $this;
	}

	public function getFullname(): ?string {
		return $this->fullname;
	}

	public function setFullname(?string $fullname): ReadServiceOrders {
		$this->fullname = $fullname;
		return $this;
	}

	public function getUsersName(): ?string {
		return $this->users_name;
	}

	public function setUsersName(?string $users_name): ReadServiceOrders {
		$this->users_name = $users_name;
		return $this;
	}

	public function getUsersLastname(): ?string {
		return $this->users_lastname;
	}

	public function setUsersLastname(?string $users_lastname): ReadServiceOrders {
		$this->users_lastname = $users_lastname;
		return $this;
	}

	public function getUsersIdentification(): ?string {
		return $this->users_identification;
	}

	public function setUsersIdentification(?string $users_identification): ReadServiceOrders {
		$this->users_identification = $users_identification;
		return $this;
	}

	public function getUsersAddress(): ?string {
		return $this->users_address;
	}

	public function setUsersAddress(?string $users_address): ReadServiceOrders {
		$this->users_address = $users_address;
		return $this;
	}

	public function getUsersPhone(): ?int {
		return $this->users_phone;
	}

	public function setUsersPhone(?int $users_phone): ReadServiceOrders {
		$this->users_phone = $users_phone;
		return $this;
	}

	public function getUsersEmail(): ?string {
		return $this->users_email;
	}

	public function setUsersEmail(?string $users_email): ReadServiceOrders {
		$this->users_email = $users_email;
		return $this;
	}

	public function getIddocumentTypes(): ?int {
		return $this->iddocument_types;
	}

	public function setIddocumentTypes(?int $iddocument_types): ReadServiceOrders {
		$this->iddocument_types = $iddocument_types;
		return $this;
	}

	public function getDocumentTypesName(): ?string {
		return $this->document_types_name;
	}

	public function setDocumentTypesName(?string $document_types_name): ReadServiceOrders {
		$this->document_types_name = $document_types_name;
		return $this;
	}

	public function getIdserviceStates(): ?int {
		return $this->idservice_states;
	}

	public function setIdserviceStates(?int $idservice_states): ReadServiceOrders {
		$this->idservice_states = $idservice_states;
		return $this;
	}

	public function getIdproducts(): ?int {
		return $this->idproducts;
	}

	public function setIdproducts(?int $idproducts): ReadServiceOrders {
		$this->idproducts = $idproducts;
		return $this;
	}

	public function getServiceOrdersCreationDate(): ?string {
		return $this->service_orders_creation_date;
	}

	public function setServiceOrdersCreationDate(?string $service_orders_creation_date): ReadServiceOrders {
		$this->service_orders_creation_date = $service_orders_creation_date;
		return $this;
	}

	public function getServiceOrdersDateDelivery(): ?string {
		return $this->service_orders_date_delivery;
	}

	public function setServiceOrdersDateDelivery(?string $service_orders_date_delivery): ReadServiceOrders {
		$this->service_orders_date_delivery = $service_orders_date_delivery;
		return $this;
	}

	public function getServiceOrdersFinishedProduct(): ?string {
		return $this->service_orders_finished_product;
	}

	public function setServiceOrdersFinishedProduct(?string $service_orders_finished_product): ReadServiceOrders {
		$this->service_orders_finished_product = $service_orders_finished_product;
		return $this;
	}

	public function getServiceOrdersType(): ?string {
		return $this->service_orders_type;
	}

	public function setServiceOrdersType(?string $service_orders_type): ReadServiceOrders {
		$this->service_orders_type = $service_orders_type;
		return $this;
	}

	public function getServiceOrdersConsecutive(): ?string {
		return $this->service_orders_consecutive;
	}

	public function setServiceOrdersConsecutive(?string $service_orders_consecutive): ReadServiceOrders {
		$this->service_orders_consecutive = $service_orders_consecutive;
		return $this;
	}

	public function getFullConsecutive(): ?string {
		return $this->full_consecutive;
	}

	public function setFullConsecutive(?string $full_consecutive): ReadServiceOrders {
		$this->full_consecutive = $full_consecutive;
		return $this;
	}

	public function getServiceOrdersAmount(): ?int {
		return $this->service_orders_amount;
	}

	public function setServiceOrdersAmount(?int $service_orders_amount): ReadServiceOrders {
		$this->service_orders_amount = $service_orders_amount;
		return $this;
	}

	public function getServiceOrdersNotDefectiveAmount(): ?int {
		return $this->service_orders_not_defective_amount;
	}

	public function setServiceOrdersNotDefectiveAmount(?int $service_orders_not_defective_amount): ReadServiceOrders {
		$this->service_orders_not_defective_amount = $service_orders_not_defective_amount;
		return $this;
	}

	public function getServiceOrdersDefectiveAmount(): ?int {
		return $this->service_orders_defective_amount;
	}

	public function setServiceOrdersDefectiveAmount(?int $service_orders_defective_amount): ReadServiceOrders {
		$this->service_orders_defective_amount = $service_orders_defective_amount;
		return $this;
	}

	public function getServiceOrdersObservation(): ?string {
		return $this->service_orders_observation;
	}

	public function setServiceOrdersObservation(?string $service_orders_observation): ReadServiceOrders {
		$this->service_orders_observation = $service_orders_observation;
		return $this;
	}

	public function getServiceOrdersTotalPrice(): ?int {
		return $this->service_orders_total_price;
	}

	public function setServiceOrdersTotalPrice(?int $service_orders_total_price): ReadServiceOrders {
		$this->service_orders_total_price = $service_orders_total_price;
		return $this;
	}

	public function getServiceOrdersPendingAmount(): ?int {
		return $this->service_orders_pending_amount;
	}

	public function setServiceOrdersPendingAmount(?int $service_orders_pending_amount): ReadServiceOrders {
		$this->service_orders_pending_amount = $service_orders_pending_amount;
		return $this;
	}

	public function getServiceOrdersCode(): ?string {
		return $this->service_orders_code;
	}

	public function setServiceOrdersCode(?string $service_orders_code): ReadServiceOrders {
		$this->service_orders_code = $service_orders_code;
		return $this;
	}

	public function getServiceType(): ?string {
		return $this->service_type;
	}

	public function setServiceType(?string $service_type): ReadServiceOrders {
		$this->service_type = $service_type;
		return $this;
	}

	public function getProductsReference(): ?string {
		return $this->products_reference;
	}

	public function setProductsReference(?string $products_reference): ReadServiceOrders {
		$this->products_reference = $products_reference;
		return $this;
	}

	public function getProductsDescription(): ?string {
		return $this->products_description;
	}

	public function setProductsDescription(?string $products_description): ReadServiceOrders {
		$this->products_description = $products_description;
		return $this;
	}

	public function getProductTypesName(): ?string {
		return $this->product_types_name;
	}

	public function setProductTypesName(?string $product_types_name): ReadServiceOrders {
		$this->product_types_name = $product_types_name;
		return $this;
	}

}