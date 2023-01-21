<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class ServiceRequestEmailRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "service_request_email")
                ->message("El correo es requerido");

            $validator
                ->rule("email", "service_request_email")
                ->message("El correo no es valido");
		});
	}

}