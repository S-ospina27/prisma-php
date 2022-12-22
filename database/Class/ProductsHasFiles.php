<?php

namespace Database\Class;

class ProductsHasFiles implements \JsonSerializable {

	private ?int $idproducts = null;
	private ?int $idfiles = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ProductsHasFiles {
		$productshasfiles = new ProductsHasFiles();

		$productshasfiles->setIdproducts(
			isset(request->idproducts) ? request->idproducts : null
		);

		$productshasfiles->setIdfiles(
			isset(request->idfiles) ? request->idfiles : null
		);

		return $productshasfiles;
	}

	public function getIdproducts(): ?int {
		return $this->idproducts;
	}

	public function setIdproducts(?int $idproducts): ProductsHasFiles {
		$this->idproducts = $idproducts;
		return $this;
	}

	public function getIdfiles(): ?int {
		return $this->idfiles;
	}

	public function setIdfiles(?int $idfiles): ProductsHasFiles {
		$this->idfiles = $idfiles;
		return $this;
	}

}