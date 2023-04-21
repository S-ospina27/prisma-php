<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class ServiceRequestEmailRule {

	use ShowErrors;

    public static string $field = "service_request_email";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("El correo es requerido");

            $validator
                ->rule("email", self::$field)
                ->message("El correo no es valido");
		});
	}

}