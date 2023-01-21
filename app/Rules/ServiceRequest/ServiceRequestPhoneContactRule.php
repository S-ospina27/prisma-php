<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class ServiceRequestPhoneContactRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "service_request_phone_contact")
                ->message("El teléfono del cliente es requerido");

            $validator
                ->rule("lengthMin", "service_request_phone_contact", 10)
                ->message("El teléfono del cliente debe tener mínimo 10 caracteres");

            $validator
                ->rule("lengthMax", "service_request_phone_contact", 10)
                ->message("El teléfono del cliente debe tener máximo 10 caracteres");

            $validator
                ->rule("integer", "service_request_phone_contact")
                ->message("El teléfono del cliente debe tener solo números");
		});
	}

}