<?php

namespace Database\Class;

class Cities implements \JsonSerializable {

	private ?int $idcities = null;
	private ?string $cities_name = null;
	private ?int $iddepartments = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): Cities {
		$cities = new Cities();

		$cities->setIdcities(
			isset(request->idcities) ? request->idcities : null
		);

		$cities->setCitiesName(
			isset(request->cities_name) ? request->cities_name : null
		);

		$cities->setIddepartments(
			isset(request->iddepartments) ? request->iddepartments : null
		);

		return $cities;
	}

	public function getIdcities(): ?int {
		return $this->idcities;
	}

	public function setIdcities(?int $idcities): Cities {
		$this->idcities = $idcities;
		return $this;
	}

	public function getCitiesName(): ?string {
		return $this->cities_name;
	}

	public function setCitiesName(?string $cities_name): Cities {
		$this->cities_name = $cities_name;
		return $this;
	}

	public function getIddepartments(): ?int {
		return $this->iddepartments;
	}

	public function setIddepartments(?int $iddepartments): Cities {
		$this->iddepartments = $iddepartments;
		return $this;
	}

}