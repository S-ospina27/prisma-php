<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class IdserviceRequestRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "idservice_request")
                ->message("la solicitud es requerida");

            $validator
                ->rule("integer", "idservice_request")
                ->message("la solicitud no es válida");

            $validator
                ->rule("min", "idservice_request", 1)
                ->message("la solicitud no es válida");
		});
	}

}