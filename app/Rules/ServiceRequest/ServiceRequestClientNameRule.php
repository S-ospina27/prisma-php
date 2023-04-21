<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class ServiceRequestClientNameRule {

	use ShowErrors;

    public static string $field = "service_request_client_name";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->addRule('name', function($field, $value, array $params, array $fields) {
                    return preg_match("/^([a-zA-Z ]+)(\s[a-zA-Z ]+)*$/", $value);
                });

            $validator
                ->rule("required", self::$field)
                ->message("El nombre del cliente es requerido");

            $validator
                ->rule("lengthMin", self::$field, 2)
                ->message("El nombre del cliente debe tener mínimo 2 caracteres");

            $validator
                ->rule("lengthMax", self::$field, 25)
                ->message("El nombre del cliente debe tener máximo 25 caracteres");

            $validator
                ->rule("name", self::$field)
                ->message("El nombre del cliente solo debe tener caracteres alfabeticos");
		});
	}

}