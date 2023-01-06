<?php

namespace Database\Class;

class ReadUsers implements \JsonSerializable {

	private ?int $idusers = null;
	private ?int $idroles = null;
	private ?int $iddocument_types = null;
	private ?string $users_identification = null;
	private ?string $users_name = null;
	private ?string $users_lastname = null;
	private ?string $fullname = null;
	private ?int $users_phone = null;
	private ?string $users_address = null;
	private ?int $idcities = null;
	private ?string $users_email = null;
	private ?string $users_contact_name = null;
	private ?int $users_contact_phone = null;
	private ?int $idstatus = null;
	private ?string $roles_name = null;
	private ?string $status_type = null;
	private ?string $document_types_name = null;
	private ?string $cities_name = null;
	private ?int $iddepartments = null;
	private ?string $departments_name = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadUsers {
		$readusers = new ReadUsers();

		$readusers->setIdusers(
			isset(request->idusers) ? request->idusers : null
		);

		$readusers->setIdroles(
			isset(request->idroles) ? request->idroles : null
		);

		$readusers->setIddocumentTypes(
			isset(request->iddocument_types) ? request->iddocument_types : null
		);

		$readusers->setUsersIdentification(
			isset(request->users_identification) ? request->users_identification : null
		);

		$readusers->setUsersName(
			isset(request->users_name) ? request->users_name : null
		);

		$readusers->setUsersLastname(
			isset(request->users_lastname) ? request->users_lastname : null
		);

		$readusers->setFullname(
			isset(request->fullname) ? request->fullname : null
		);

		$readusers->setUsersPhone(
			isset(request->users_phone) ? request->users_phone : null
		);

		$readusers->setUsersAddress(
			isset(request->users_address) ? request->users_address : null
		);

		$readusers->setIdcities(
			isset(request->idcities) ? request->idcities : null
		);

		$readusers->setUsersEmail(
			isset(request->users_email) ? request->users_email : null
		);

		$readusers->setUsersContactName(
			isset(request->users_contact_name) ? request->users_contact_name : null
		);

		$readusers->setUsersContactPhone(
			isset(request->users_contact_phone) ? request->users_contact_phone : null
		);

		$readusers->setIdstatus(
			isset(request->idstatus) ? request->idstatus : null
		);

		$readusers->setRolesName(
			isset(request->roles_name) ? request->roles_name : null
		);

		$readusers->setStatusType(
			isset(request->status_type) ? request->status_type : null
		);

		$readusers->setDocumentTypesName(
			isset(request->document_types_name) ? request->document_types_name : null
		);

		$readusers->setCitiesName(
			isset(request->cities_name) ? request->cities_name : null
		);

		$readusers->setIddepartments(
			isset(request->iddepartments) ? request->iddepartments : null
		);

		$readusers->setDepartmentsName(
			isset(request->departments_name) ? request->departments_name : null
		);

		return $readusers;
	}

	public function getIdusers(): ?int {
		return $this->idusers;
	}

	public function setIdusers(?int $idusers): ReadUsers {
		$this->idusers = $idusers;
		return $this;
	}

	public function getIdroles(): ?int {
		return $this->idroles;
	}

	public function setIdroles(?int $idroles): ReadUsers {
		$this->idroles = $idroles;
		return $this;
	}

	public function getIddocumentTypes(): ?int {
		return $this->iddocument_types;
	}

	public function setIddocumentTypes(?int $iddocument_types): ReadUsers {
		$this->iddocument_types = $iddocument_types;
		return $this;
	}

	public function getUsersIdentification(): ?string {
		return $this->users_identification;
	}

	public function setUsersIdentification(?string $users_identification): ReadUsers {
		$this->users_identification = $users_identification;
		return $this;
	}

	public function getUsersName(): ?string {
		return $this->users_name;
	}

	public function setUsersName(?string $users_name): ReadUsers {
		$this->users_name = $users_name;
		return $this;
	}

	public function getUsersLastname(): ?string {
		return $this->users_lastname;
	}

	public function setUsersLastname(?string $users_lastname): ReadUsers {
		$this->users_lastname = $users_lastname;
		return $this;
	}

	public function getFullname(): ?string {
		return $this->fullname;
	}

	public function setFullname(?string $fullname): ReadUsers {
		$this->fullname = $fullname;
		return $this;
	}

	public function getUsersPhone(): ?int {
		return $this->users_phone;
	}

	public function setUsersPhone(?int $users_phone): ReadUsers {
		$this->users_phone = $users_phone;
		return $this;
	}

	public function getUsersAddress(): ?string {
		return $this->users_address;
	}

	public function setUsersAddress(?string $users_address): ReadUsers {
		$this->users_address = $users_address;
		return $this;
	}

	public function getIdcities(): ?int {
		return $this->idcities;
	}

	public function setIdcities(?int $idcities): ReadUsers {
		$this->idcities = $idcities;
		return $this;
	}

	public function getUsersEmail(): ?string {
		return $this->users_email;
	}

	public function setUsersEmail(?string $users_email): ReadUsers {
		$this->users_email = $users_email;
		return $this;
	}

	public function getUsersContactName(): ?string {
		return $this->users_contact_name;
	}

	public function setUsersContactName(?string $users_contact_name): ReadUsers {
		$this->users_contact_name = $users_contact_name;
		return $this;
	}

	public function getUsersContactPhone(): ?int {
		return $this->users_contact_phone;
	}

	public function setUsersContactPhone(?int $users_contact_phone): ReadUsers {
		$this->users_contact_phone = $users_contact_phone;
		return $this;
	}

	public function getIdstatus(): ?int {
		return $this->idstatus;
	}

	public function setIdstatus(?int $idstatus): ReadUsers {
		$this->idstatus = $idstatus;
		return $this;
	}

	public function getRolesName(): ?string {
		return $this->roles_name;
	}

	public function setRolesName(?string $roles_name): ReadUsers {
		$this->roles_name = $roles_name;
		return $this;
	}

	public function getStatusType(): ?string {
		return $this->status_type;
	}

	public function setStatusType(?string $status_type): ReadUsers {
		$this->status_type = $status_type;
		return $this;
	}

	public function getDocumentTypesName(): ?string {
		return $this->document_types_name;
	}

	public function setDocumentTypesName(?string $document_types_name): ReadUsers {
		$this->document_types_name = $document_types_name;
		return $this;
	}

	public function getCitiesName(): ?string {
		return $this->cities_name;
	}

	public function setCitiesName(?string $cities_name): ReadUsers {
		$this->cities_name = $cities_name;
		return $this;
	}

	public function getIddepartments(): ?int {
		return $this->iddepartments;
	}

	public function setIddepartments(?int $iddepartments): ReadUsers {
		$this->iddepartments = $iddepartments;
		return $this;
	}

	public function getDepartmentsName(): ?string {
		return $this->departments_name;
	}

	public function setDepartmentsName(?string $departments_name): ReadUsers {
		$this->departments_name = $departments_name;
		return $this;
	}

}