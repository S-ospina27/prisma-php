<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersEmailRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "users_email")
                ->message("El correo es requerido");

            $validator
                ->rule("email", "users_email")
                ->message("El correo no es valido");
		});
	}

}