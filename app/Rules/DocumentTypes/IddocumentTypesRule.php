<?php

namespace App\Rules\DocumentTypes;

use App\Traits\Framework\ShowErrors;

class IddocumentTypesRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
			->rule("required", "iddocument_types")
			->message("El tipo de documento es  requerido");

			$validator
			->rule("integer", "iddocument_types")
			->message("El tipo de documento es valido");

			$validator
			->rule("min", "iddocument_types", 1)
			->message("El tipo de documento no es valido");
		});
	}

}