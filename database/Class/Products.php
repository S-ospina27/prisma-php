<?php

namespace Database\Class;

class Products implements \JsonSerializable {

	private ?int $idproducts = null;
	private ?string $products_reference = null;
	private ?int $idproduct_types = null;
	private ?string $products_image = null;
	private ?string $products_description = null;
	private ?string $products_color = null;
	private ?int $idusers = null;
	private ?int $idstatus = null;

	public function __construct() {}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): Products {
		$products = new Products();

		$products->setIdproducts(
			isset(request->idproducts) ? request->idproducts : null
		);

		$products->setProductsReference(
			isset(request->products_reference) ? request->products_reference : null
		);

		$products->setIdproductTypes(
			isset(request->idproduct_types) ? request->idproduct_types : null
		);

		$products->setProductsImage(
			isset(request->products_image) ? request->products_image : null
		);

		$products->setProductsDescription(
			isset(request->products_description) ? request->products_description : null
		);

		$products->setProductsColor(
			isset(request->products_color) ? request->products_color : null
		);

		$products->setIdusers(
			isset(request->idusers) ? request->idusers : null
		);

		$products->setIdstatus(
			isset(request->idstatus) ? request->idstatus : null
		);

		return $products;
	}

	public function getIdproducts(): ?int {
		return $this->idproducts;
	}

	public function setIdproducts(?int $idproducts): Products {
		$this->idproducts = $idproducts;
		return $this;
	}

	public function getProductsReference(): ?string {
		return $this->products_reference;
	}

	public function setProductsReference(?string $products_reference): Products {
		$this->products_reference = $products_reference;
		return $this;
	}

	public function getIdproductTypes(): ?int {
		return $this->idproduct_types;
	}

	public function setIdproductTypes(?int $idproduct_types): Products {
		$this->idproduct_types = $idproduct_types;
		return $this;
	}

	public function getProductsImage(): ?string {
		return $this->products_image;
	}

	public function setProductsImage(?string $products_image): Products {
		$this->products_image = $products_image;
		return $this;
	}

	public function getProductsDescription(): ?string {
		return $this->products_description;
	}

	public function setProductsDescription(?string $products_description): Products {
		$this->products_description = $products_description;
		return $this;
	}

	public function getProductsColor(): ?string {
		return $this->products_color;
	}

	public function setProductsColor(?string $products_color): Products {
		$this->products_color = $products_color;
		return $this;
	}

	public function getIdusers(): ?int {
		return $this->idusers;
	}

	public function setIdusers(?int $idusers): Products {
		$this->idusers = $idusers;
		return $this;
	}

	public function getIdstatus(): ?int {
		return $this->idstatus;
	}

	public function setIdstatus(?int $idstatus): Products {
		$this->idstatus = $idstatus;
		return $this;
	}

}