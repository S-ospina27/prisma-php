<?php

namespace App\Rules\Roles;

use App\Traits\Framework\ShowErrors;

class IdrolesRule {

	use ShowErrors;

    public static string $field = "idroles";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->rule("required", self::$field)
    			->message("El rol es  requerido");

			$validator
    			->rule("integer", self::$field)
    			->message("El rol no es valido");

			$validator
    			->rule("min", self::$field, 1)
    			->message("El rol no es valido");
		});
	}

}