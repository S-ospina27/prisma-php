<?php

namespace Database\Class;

class ProductTypes implements \JsonSerializable {

	private ?int $idproduct_types = null;
	private ?string $product_types_name = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ProductTypes {
		$producttypes = new ProductTypes();

		$producttypes->setIdproductTypes(
			isset(request->idproduct_types) ? request->idproduct_types : null
		);

		$producttypes->setProductTypesName(
			isset(request->product_types_name) ? request->product_types_name : null
		);

		return $producttypes;
	}

	public function getIdproductTypes(): ?int {
		return $this->idproduct_types;
	}

	public function setIdproductTypes(?int $idproduct_types): ProductTypes {
		$this->idproduct_types = $idproduct_types;
		return $this;
	}

	public function getProductTypesName(): ?string {
		return $this->product_types_name;
	}

	public function setProductTypesName(?string $product_types_name): ProductTypes {
		$this->product_types_name = $product_types_name;
		return $this;
	}

}