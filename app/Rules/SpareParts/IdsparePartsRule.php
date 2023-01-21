<?php

namespace App\Rules\SpareParts;

use App\Traits\Framework\ShowErrors;

class IdsparePartsRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
			->rule("required", "idspare_parts")
			->message("El repuesto es  requerida");

			$validator
			->rule("integer", "idspare_parts")
			->message("El repuesto  no es valida");

			$validator
			->rule("min", "idspare_parts", 1)
			->message("El repuesto no es valido");
		});
	}

}