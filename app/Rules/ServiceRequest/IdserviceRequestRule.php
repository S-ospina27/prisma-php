<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class IdserviceRequestRule {

	use ShowErrors;

    public static string $field = "idservice_request";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("La solicitud es requerida");

            $validator
                ->rule("integer", self::$field)
                ->message("La solicitud no es válida");

            $validator
                ->rule("min", self::$field, 1)
                ->message("La solicitud no es válida");
		});
	}

}