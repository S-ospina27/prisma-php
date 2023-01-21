<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class ServiceRequestNeighborhoodRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
            $validator
                ->addRule('neighborhood', function($field, $value, array $params, array $fields) {
                    return preg_match("/^([a-zA-Z0-9,- ]+)(\s[a-zA-Z0-9,- ]+)*$/", $value);
                });

			$validator
                ->rule("required", "service_request_neighborhood")
                ->message("El barrio es requerido");

            $validator
                ->rule("neighborhood", "service_request_neighborhood")
                ->message("El barrio no es válido");

                $validator
                ->rule("lengthMin", "service_request_client_name", 5)
                ->message("El barrio debe tener mínimo 5 caracteres");

            $validator
                ->rule("lengthMax", "service_request_client_name", 45)
                ->message("El barrio debe tener máximo 45 caracteres");
		});
	}

}