<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class IdusersDealersRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "idusers_dealers")
                ->message("El distribuidor es requerido");

            $validator
                ->rule("integer", "idusers_dealers")
                ->message("El distribuidor no es valido");

            $validator
                ->rule("min", "idusers_dealers", 1)
                ->message("El distribuidor no es valido");
		});
	}

}