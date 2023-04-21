<?php

namespace App\Rules\SpareParts;

use App\Traits\Framework\ShowErrors;

class IdsparePartsRule {

	use ShowErrors;

    public static string $field = "idspare_parts";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->rule("required", self::$field)
    			->message("El repuesto es requerido");

			$validator
    			->rule("integer", self::$field)
    			->message("El repuesto no es válido");

			$validator
    			->rule("min", self::$field, 1)
    			->message("El repuesto no es válido");
		});
	}

}