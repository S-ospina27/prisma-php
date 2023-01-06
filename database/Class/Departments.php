<?php

namespace Database\Class;

class Departments implements \JsonSerializable {

	private ?int $iddepartments = null;
	private ?string $departments_name = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): Departments {
		$departments = new Departments();

		$departments->setIddepartments(
			isset(request->iddepartments) ? request->iddepartments : null
		);

		$departments->setDepartmentsName(
			isset(request->departments_name) ? request->departments_name : null
		);

		return $departments;
	}

	public function getIddepartments(): ?int {
		return $this->iddepartments;
	}

	public function setIddepartments(?int $iddepartments): Departments {
		$this->iddepartments = $iddepartments;
		return $this;
	}

	public function getDepartmentsName(): ?string {
		return $this->departments_name;
	}

	public function setDepartmentsName(?string $departments_name): Departments {
		$this->departments_name = $departments_name;
		return $this;
	}

}