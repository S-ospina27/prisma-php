<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Database\Class\Users;
use LionHelpers\Arr;
use LionHelpers\Str;
use LionSecurity\RSA;
use LionSecurity\Validation;

class UsersController {

	private UsersModel $usersModel;

	public function __construct() {
		$this->usersModel = new UsersModel();
	}

	public function createUsers() {
        $users_contact_phone = Str::of(request->users_contact_phone)->toNull();
		$rsa_encode = RSA::encode([
			'users_password' => Validation::passwordHash(request->users_password)
		]);

		$responseCreate = $this->usersModel->createUsersDB(
			Users::formFields()
                // ->setIdroles(4)
                ->setIdstatus(1)
                ->setUsersPassword($rsa_encode->users_password)
                ->setUsersContactName(Str::of(request->users_contact_name)->toNull())
                ->setUsersContactPhone($users_contact_phone === null ? null : (int) $users_contact_phone)
        );

		if ($responseCreate->status === 'database-error') {
            return $responseCreate;
			return response->error('Ha ocurrido un error al crear el usuario');
		}

		return response->success('Usuario creado correctamente');
	}

	public function readUsers() {
		return $this->usersModel->readUsersDB();
	}

    public function readUsersByRol() {
        return Arr::of($this->usersModel->readUsersDB())->tree('roles_name');
    }

	public function updateUsers() {
        $users_contact_phone = Str::of(request->users_contact_phone)->toNull();

        $responseUpdate= $this->usersModel->updateUsersDB(
            Users::formFields()
                ->setUsersContactName(Str::of(request->users_contact_name)->toNull())
                ->setUsersContactPhone($users_contact_phone === null ? null : (int) $users_contact_phone)
        );

        if ($responseUpdate->status === 'database-error') {
            return response->error('a ocurrido un error al actualizar el usuario');
        }

        return response->success('Usuario actualizado correctamente');
    }

}