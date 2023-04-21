<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersPasswordRule {

	use ShowErrors;

    public static string $field = "users_password";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("La contraseña es requerida");

            $validator
                ->rule("lengthMin", self::$field, 64)
                ->message("La contraseña no es válida");

            $validator
                ->rule("lengthMax", self::$field, 64)
                ->message("La contraseña no es válida");
		});
	}

}