<?php

namespace Database\Class;

class ReadProducts implements \JsonSerializable {

	private ?int $idusers = null;
	private ?int $idproducts = null;
	private ?int $idproduct_types = null;
	private ?int $idstatus = null;
	private ?string $products_reference = null;
	private ?string $products_image = null;
	private ?string $products_description = null;
	private ?string $products_color = null;
	private ?string $product_types_name = null;
	private ?string $users_name = null;
	private ?string $status_type = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadProducts {
		$readproducts = new ReadProducts();

		$readproducts->setIdusers(
			isset(request->idusers) ? request->idusers : null
		);

		$readproducts->setIdproducts(
			isset(request->idproducts) ? request->idproducts : null
		);

		$readproducts->setIdproductTypes(
			isset(request->idproduct_types) ? request->idproduct_types : null
		);

		$readproducts->setIdstatus(
			isset(request->idstatus) ? request->idstatus : null
		);

		$readproducts->setProductsReference(
			isset(request->products_reference) ? request->products_reference : null
		);

		$readproducts->setProductsImage(
			isset(request->products_image) ? request->products_image : null
		);

		$readproducts->setProductsDescription(
			isset(request->products_description) ? request->products_description : null
		);

		$readproducts->setProductsColor(
			isset(request->products_color) ? request->products_color : null
		);

		$readproducts->setProductTypesName(
			isset(request->product_types_name) ? request->product_types_name : null
		);

		$readproducts->setUsersName(
			isset(request->users_name) ? request->users_name : null
		);

		$readproducts->setStatusType(
			isset(request->status_type) ? request->status_type : null
		);

		return $readproducts;
	}

	public function getIdusers(): ?int {
		return $this->idusers;
	}

	public function setIdusers(?int $idusers): ReadProducts {
		$this->idusers = $idusers;
		return $this;
	}

	public function getIdproducts(): ?int {
		return $this->idproducts;
	}

	public function setIdproducts(?int $idproducts): ReadProducts {
		$this->idproducts = $idproducts;
		return $this;
	}

	public function getIdproductTypes(): ?int {
		return $this->idproduct_types;
	}

	public function setIdproductTypes(?int $idproduct_types): ReadProducts {
		$this->idproduct_types = $idproduct_types;
		return $this;
	}

	public function getIdstatus(): ?int {
		return $this->idstatus;
	}

	public function setIdstatus(?int $idstatus): ReadProducts {
		$this->idstatus = $idstatus;
		return $this;
	}

	public function getProductsReference(): ?string {
		return $this->products_reference;
	}

	public function setProductsReference(?string $products_reference): ReadProducts {
		$this->products_reference = $products_reference;
		return $this;
	}

	public function getProductsImage(): ?string {
		return $this->products_image;
	}

	public function setProductsImage(?string $products_image): ReadProducts {
		$this->products_image = $products_image;
		return $this;
	}

	public function getProductsDescription(): ?string {
		return $this->products_description;
	}

	public function setProductsDescription(?string $products_description): ReadProducts {
		$this->products_description = $products_description;
		return $this;
	}

	public function getProductsColor(): ?string {
		return $this->products_color;
	}

	public function setProductsColor(?string $products_color): ReadProducts {
		$this->products_color = $products_color;
		return $this;
	}

	public function getProductTypesName(): ?string {
		return $this->product_types_name;
	}

	public function setProductTypesName(?string $product_types_name): ReadProducts {
		$this->product_types_name = $product_types_name;
		return $this;
	}

	public function getUsersName(): ?string {
		return $this->users_name;
	}

	public function setUsersName(?string $users_name): ReadProducts {
		$this->users_name = $users_name;
		return $this;
	}

	public function getStatusType(): ?string {
		return $this->status_type;
	}

	public function setStatusType(?string $status_type): ReadProducts {
		$this->status_type = $status_type;
		return $this;
	}

}