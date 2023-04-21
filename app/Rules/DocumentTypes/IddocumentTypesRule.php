<?php

namespace App\Rules\DocumentTypes;

use App\Traits\Framework\ShowErrors;

class IddocumentTypesRule {

	use ShowErrors;

    public static string $field = "iddocument_types";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->rule("required", self::$field)
    			->message("El tipo de documento es  requerido");

			$validator
    			->rule("integer", self::$field)
    			->message("El tipo de documento es valido");

			$validator
    			->rule("min", self::$field, 1)
    			->message("El tipo de documento no es valido");
		});
	}

}