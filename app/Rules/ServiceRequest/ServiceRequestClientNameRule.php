<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class ServiceRequestClientNameRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->addRule('name', function($field, $value, array $params, array $fields) {
                    return preg_match("/^([a-zA-Z ]+)(\s[a-zA-Z ]+)*$/", $value);
                });

            $validator
                ->rule("required", "service_request_client_name")
                ->message("El nombre del cliente es requerido");

            $validator
                ->rule("lengthMin", "service_request_client_name", 2)
                ->message("El nombre del cliente debe tener mínimo 2 caracteres");

            $validator
                ->rule("lengthMax", "service_request_client_name", 25)
                ->message("El nombre del cliente debe tener máximo 25 caracteres");

            $validator
                ->rule("name", "service_request_client_name")
                ->message("El nombre del cliente solo debe tener caracteres alfabeticos");
		});
	}

}