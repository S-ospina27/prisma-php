<?php

namespace Database\Class;

class ReadDocumentTypes implements \JsonSerializable {

	private ?int $idproduct_types = null;
	private ?string $product_types_name = null;

	public function __construct() {}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadDocumentTypes {
		$readdocumenttypes = new ReadDocumentTypes();

		$readdocumenttypes->setIdproductTypes(
			isset(request->idproduct_types) ? request->idproduct_types : null
		);

		$readdocumenttypes->setProductTypesName(
			isset(request->product_types_name) ? request->product_types_name : null
		);

		return $readdocumenttypes;
	}

	public function getIdproductTypes(): ?int {
		return $this->idproduct_types;
	}

	public function setIdproductTypes(?int $idproduct_types): ReadDocumentTypes {
		$this->idproduct_types = $idproduct_types;
		return $this;
	}

	public function getProductTypesName(): ?string {
		return $this->product_types_name;
	}

	public function setProductTypesName(?string $product_types_name): ReadDocumentTypes {
		$this->product_types_name = $product_types_name;
		return $this;
	}

}