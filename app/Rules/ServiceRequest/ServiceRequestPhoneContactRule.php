<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class ServiceRequestPhoneContactRule {

	use ShowErrors;

    public static string $field = "service_request_phone_contact";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("El teléfono del cliente es requerido");

            $validator
                ->rule("lengthMin", self::$field, 10)
                ->message("El teléfono del cliente debe tener mínimo 10 caracteres");

            $validator
                ->rule("lengthMax", self::$field, 10)
                ->message("El teléfono del cliente debe tener máximo 10 caracteres");

            $validator
                ->rule("integer", self::$field)
                ->message("El teléfono del cliente debe tener solo números");
		});
	}

}