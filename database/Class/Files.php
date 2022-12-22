<?php

namespace Database\Class;

class Files implements \JsonSerializable {

	private ?int $idfiles = null;
	private ?string $files_name = null;
	private ?string $files_creation_date = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): Files {
		$files = new Files();

		$files->setIdfiles(
			isset(request->idfiles) ? request->idfiles : null
		);

		$files->setFilesName(
			isset(request->files_name) ? request->files_name : null
		);

		$files->setFilesCreationDate(
			isset(request->files_creation_date) ? request->files_creation_date : null
		);

		return $files;
	}

	public function getIdfiles(): ?int {
		return $this->idfiles;
	}

	public function setIdfiles(?int $idfiles): Files {
		$this->idfiles = $idfiles;
		return $this;
	}

	public function getFilesName(): ?string {
		return $this->files_name;
	}

	public function setFilesName(?string $files_name): Files {
		$this->files_name = $files_name;
		return $this;
	}

	public function getFilesCreationDate(): ?string {
		return $this->files_creation_date;
	}

	public function setFilesCreationDate(?string $files_creation_date): Files {
		$this->files_creation_date = $files_creation_date;
		return $this;
	}

}