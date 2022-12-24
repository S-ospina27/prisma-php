<?php

namespace App\Http\Controllers;
use App\Models\UsersModel;
use Database\Class\Users;
use LionHelpers\Arr;
use LionSecurity\RSA;
use LionSecurity\Validation;

class UsersController {

	private UsersModel $usersModel;

	public function __construct() {
		$this->usersModel = new UsersModel();
	}

	public function createUsers() {
		$rsa_encode = RSA::encode([
			'users_password' => Validation::passwordHash(request->users_password)
		]);

		$responseCreate = $this->usersModel->createUsersDB(
			Users::formFields()
                ->setIdstatus(1)
                ->setUsersPassword($rsa_encode->users_password)
        );

		if ($responseCreate->status === 'database-error') {
			return response->error('Ha ocurrido un error al crear el usuario');
		}

		return response->success('Usuario creado correctamente');
	}

	public function readUsers() {
		return $this->usersModel->readUsersDB();
	}

    public function readFilterUsers() {
        return Arr::of($this->readUsers())->tree('roles_name');
    }

	public function updateUser() {
        $responseUpdate= $this->usersModel->updateUserDB(
            Users::formFields()
        );

        if ($responseUpdate->status==='database-error') {
            return response->error('Ha ocurrido un error al actualizar el usuario');
        }

        return response->success('Usuario actualizado correctamente ');
    }

}