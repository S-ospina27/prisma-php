<?php

namespace App\Rules\Cities;

use App\Traits\Framework\ShowErrors;

class IdcitiesRule {

	use ShowErrors;

    public static string $field = "idcities";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("La ciudad es requerida");

            $validator
                ->rule("integer", self::$field)
                ->message("El distribuidor no es valido");

            $validator
                ->rule("min", self::$field, 1)
                ->message("El distribuidor no es valido");
		});
	}

}