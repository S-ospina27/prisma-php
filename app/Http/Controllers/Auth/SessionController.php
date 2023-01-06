<?php

namespace App\Http\Controllers\Auth;

use LionSecurity\JWT;

class SessionController {

	public function __construct() {

	}

    public function refreshToken() {
        return response->success('Sesión refrescada', [
            'jwt' => JWT::encode([
                'session' => true
            ])
        ]);
    }

}