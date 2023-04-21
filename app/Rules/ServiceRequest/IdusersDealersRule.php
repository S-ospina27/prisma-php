<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class IdusersDealersRule {

	use ShowErrors;

    public static string $field = "idusers_dealers";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("El distribuidor es requerido");

            $validator
                ->rule("integer", self::$field)
                ->message("El distribuidor no es valido");

            $validator
                ->rule("min", self::$field, 1)
                ->message("El distribuidor no es valido");
		});
	}

}