<?php

namespace App\Rules\ServiceStates;

use App\Traits\Framework\ShowErrors;

class IdserviceStatesRule {

	use ShowErrors;

    public static string $field = "idservice_states";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("El estado es requerido");

            $validator
                ->rule("integer", self::$field)
                ->message("El estado no es válido");

            $validator
                ->rule("min", self::$field, 1)
                ->message("El estado no es válido");
		});
	}

}