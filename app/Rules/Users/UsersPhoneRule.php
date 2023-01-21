<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersPhoneRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
			->rule("required", "users_phone")
			->message("El telefono es requerido");

			$validator
			->rule("lengthMin", "users_phone", 10)
			->message("El telefono debe tener mínimo 10 caracteres");

			$validator
			->rule("lengthMax", "users_phone", 10)
			->message("El telefono debe tener máximo 10 caracteres");

		});
	}

}