<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersIdentificationRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
			->rule("required", "users_identification")
			->message("El  numero de identificación es  requerido");

			$validator
			->rule("integer", "users_identification")
			->message("El numero de identificación valido");
			$validator
			->rule("lengthMin", "users_identification", 8)
			->message("El numero de identificación debe contener minimo 8 caracteres");

			$validator
			->rule("lengthMax", "users_identification", 10)
			->message("El numero de identificación debe contener maximo 10 caracteres");

		});
	}

}