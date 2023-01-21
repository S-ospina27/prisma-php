<?php

namespace App\Rules\Cities;

use App\Traits\Framework\ShowErrors;

class IdcitiesRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "idcities")
                ->message("La ciudad es requerida");

            $validator
                ->rule("integer", "idcities")
                ->message("El distribuidor no es valido");

            $validator
                ->rule("min", "idcities", 1)
                ->message("El distribuidor no es valido");
		});
	}

}