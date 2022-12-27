<?php

namespace Database\Class;

class Users implements \JsonSerializable {

	private ?int $idusers = null;
	private ?int $idroles = null;
	private ?int $iddocument_types = null;
	private ?string $users_identification = null;
	private ?string $users_name = null;
	private ?string $users_lastname = null;
	private ?int $users_phone = null;
	private ?string $users_address = null;
	private ?int $idcities = null;
	private ?string $users_email = null;
	private ?string $users_password = null;
	private ?string $users_contact_name = null;
	private ?int $users_contact_phone = null;
	private ?int $idstatus = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): Users {
		$users = new Users();

		$users->setIdusers(
			isset(request->idusers) ? (int) request->idusers : null
		);

		$users->setIdroles(
			isset(request->idroles) ? (int) request->idroles : null
		);

		$users->setIddocumentTypes(
			isset(request->iddocument_types) ? (int) request->iddocument_types : null
		);

		$users->setUsersIdentification(
			isset(request->users_identification) ? (int) request->users_identification : null
		);

		$users->setUsersName(
			isset(request->users_name) ? request->users_name : null
		);

		$users->setUsersLastname(
			isset(request->users_lastname) ? request->users_lastname : null
		);

		$users->setUsersPhone(
			isset(request->users_phone) ? (int) request->users_phone : null
		);

		$users->setUsersAddress(
			isset(request->users_address) ? request->users_address : null
		);

		$users->setIdcities(
			isset(request->idcities) ? (int) request->idcities : null
		);

		$users->setUsersEmail(
			isset(request->users_email) ? request->users_email : null
		);

		$users->setUsersPassword(
			isset(request->users_password) ? request->users_password : null
		);

		$users->setUsersContactName(
			isset(request->users_contact_name) ? request->users_contact_name : null
		);

		$users->setUsersContactPhone(
			isset(request->users_contact_phone) ? (int) request->users_contact_phone : null
		);

		$users->setIdstatus(
			isset(request->idstatus) ? (int) request->idstatus : null
		);

		return $users;
	}

	public function getIdusers(): ?int {
		return $this->idusers;
	}

	public function setIdusers(?int $idusers): Users {
		$this->idusers = $idusers;
		return $this;
	}

	public function getIdroles(): ?int {
		return $this->idroles;
	}

	public function setIdroles(?int $idroles): Users {
		$this->idroles = $idroles;
		return $this;
	}

	public function getIddocumentTypes(): ?int {
		return $this->iddocument_types;
	}

	public function setIddocumentTypes(?int $iddocument_types): Users {
		$this->iddocument_types = $iddocument_types;
		return $this;
	}

	public function getUsersIdentification(): ?string {
		return $this->users_identification;
	}

	public function setUsersIdentification(?string $users_identification): Users {
		$this->users_identification = $users_identification;
		return $this;
	}

	public function getUsersName(): ?string {
		return $this->users_name;
	}

	public function setUsersName(?string $users_name): Users {
		$this->users_name = $users_name;
		return $this;
	}

	public function getUsersLastname(): ?string {
		return $this->users_lastname;
	}

	public function setUsersLastname(?string $users_lastname): Users {
		$this->users_lastname = $users_lastname;
		return $this;
	}

	public function getUsersPhone(): ?int {
		return $this->users_phone;
	}

	public function setUsersPhone(?int $users_phone): Users {
		$this->users_phone = $users_phone;
		return $this;
	}

	public function getUsersAddress(): ?string {
		return $this->users_address;
	}

	public function setUsersAddress(?string $users_address): Users {
		$this->users_address = $users_address;
		return $this;
	}

	public function getIdcities(): ?int {
		return $this->idcities;
	}

	public function setIdcities(?int $idcities): Users {
		$this->idcities = $idcities;
		return $this;
	}

	public function getUsersEmail(): ?string {
		return $this->users_email;
	}

	public function setUsersEmail(?string $users_email): Users {
		$this->users_email = $users_email;
		return $this;
	}

	public function getUsersPassword(): ?string {
		return $this->users_password;
	}

	public function setUsersPassword(?string $users_password): Users {
		$this->users_password = $users_password;
		return $this;
	}

	public function getUsersContactName(): ?string {
		return $this->users_contact_name;
	}

	public function setUsersContactName(?string $users_contact_name): Users {
		$this->users_contact_name = $users_contact_name;
		return $this;
	}

	public function getUsersContactPhone(): ?int {
		return $this->users_contact_phone;
	}

	public function setUsersContactPhone(?int $users_contact_phone): Users {
		$this->users_contact_phone = $users_contact_phone;
		return $this;
	}

	public function getIdstatus(): ?int {
		return $this->idstatus;
	}

	public function setIdstatus(?int $idstatus): Users {
		$this->idstatus = $idstatus;
		return $this;
	}

}