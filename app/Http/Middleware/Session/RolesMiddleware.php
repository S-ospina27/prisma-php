<?php

namespace App\Http\Middleware\Session;

use LionSecurity\JWT;

class RolesMiddleware {

	public function __construct() {

	}

    public function administratorAccess() {
        $data = JWT::decode(JWT::get());

        if ($data->idroles != 1) {
            finish(response->error("No tiene autorización para realizar esta acción"));
        }
    }

    public function technicalAccess() {
        $data = JWT::decode(JWT::get());

        if ($data->idroles != 2) {
            finish(response->error("No tiene autorización para realizar esta acción"));
        }
    }

    public function dealerAccess() {
        $data = JWT::decode(JWT::get());

        if ($data->idroles != 3) {
            finish(response->error("No tiene autorización para realizar esta acción"));
        }
    }

    public function providerAccess() {
        $data = JWT::decode(JWT::get());

        if ($data->idroles != 4) {
            finish(response->error("No tiene autorización para realizar esta acción"));
        }
    }

}