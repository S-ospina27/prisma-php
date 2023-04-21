<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class IdusersRule {

	use ShowErrors;

    public static string $field = "idusers";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->rule("required", self::$field)
    			->message("El usuario es  requerido");

			$validator
                ->rule("integer", self::$field)
                ->message("El  usuario no es valido");

			$validator
                ->rule("min", self::$field, 1)
                ->message("El usuario no es valido");
		});
	}

}