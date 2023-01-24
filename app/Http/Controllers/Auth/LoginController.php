<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\LoginModel;
use Database\Class\Users;
use LionSecurity\JWT;
use LionSecurity\RSA;

class LoginController {

    private LoginModel $loginModel;

    public function __construct() {
        $this->loginModel = new LoginModel();
    }

    public function auth() {
        $users = Users::formFields();

        $cont = $this->loginModel->accountExistenceDB($users);
        if ($cont->cont === 0) {
            return response->response("existence-error", "El correo/contraseña son incorrectos");
        }

        $data = $this->loginModel->authDB($users);
        if ($data->getIdstatus() === 2) {
            return response->warning("Esta cuenta está inactiva, contacte a soporte para mas información");
        }

        if ($data->getIdroles() === 2) {
            return response->warning("No tiene autorización para acceder");
        }

        if ((int) request->count_errors >= 3) {
            $responseUpdate = $this->loginModel->updateStatusDB(
                $users->setIdstatus(2)->setIdusers($data->getIdusers())
            );

            if ($responseUpdate->status === 'database-error') {
                return response->error("Ocurrió un error al actualizar el estado");
            }

            return response->warning("Alcanzó el máximo de intentos para acceder, contacte a soporte para mas información");
        }

        $rsa_decode = RSA::decode(['users_password' => $data->getUsersPassword()]);
        if (!password_verify($users->getUsersPassword(), $rsa_decode->users_password)) {
            return response->error("El correo/contraseña son incorrectos");
        }

        $full_name = "{$data->getUsersName()} {$data->getUsersLastname()}";
        return response->success("Bienvenido: {$full_name}", [
            'jwt' => JWT::encode([
                'session' => true,
                'idusers' => $data->getIdusers(),
                'idroles' => $data->getIdroles(),
                'user_name' => $full_name,
            ])
        ]);
    }

}