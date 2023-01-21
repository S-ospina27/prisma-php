<?php

namespace App\Http\Middleware\Session;

class SessionMiddleware {

    private array $headers;

	public function __construct() {
        $this->headers = apache_request_headers();
	}

    public function closeSession() {
        if (isset($this->headers['Authorization'])) {
            response->finish(
                response->response('session-error', 'Debe cerrar sesión para realizar esta petición')
            );
        }
    }

}