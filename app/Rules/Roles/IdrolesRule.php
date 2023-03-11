<?php

namespace App\Rules\Roles;

use App\Traits\Framework\ShowErrors;

class IdrolesRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->rule("required", "idroles")
    			->message("El rol es  requerido");

			$validator
    			->rule("integer", "idroles")
    			->message("El rol no es valido");

			$validator
    			->rule("min", "idroles", 1)
    			->message("El rol no es valido");
		});
	}

}