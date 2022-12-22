<?php

namespace Database\Class;

class DocumentTypes implements \JsonSerializable {

	private ?int $iddocument_types = null;
	private ?string $document_types_name = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): DocumentTypes {
		$documenttypes = new DocumentTypes();

		$documenttypes->setIddocumentTypes(
			isset(request->iddocument_types) ? request->iddocument_types : null
		);

		$documenttypes->setDocumentTypesName(
			isset(request->document_types_name) ? request->document_types_name : null
		);

		return $documenttypes;
	}

	public function getIddocumentTypes(): ?int {
		return $this->iddocument_types;
	}

	public function setIddocumentTypes(?int $iddocument_types): DocumentTypes {
		$this->iddocument_types = $iddocument_types;
		return $this;
	}

	public function getDocumentTypesName(): ?string {
		return $this->document_types_name;
	}

	public function setDocumentTypesName(?string $document_types_name): DocumentTypes {
		$this->document_types_name = $document_types_name;
		return $this;
	}

}