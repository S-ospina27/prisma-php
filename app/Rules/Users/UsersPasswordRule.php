<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersPasswordRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "users_password")
                ->message("La contraseña es requerida");

            $validator
                ->rule("lengthMin", "users_password", 64)
                ->message("La contraseña no es válida");

            $validator
                ->rule("lengthMax", "users_password", 64)
                ->message("La contraseña no es válida");
		});
	}

}