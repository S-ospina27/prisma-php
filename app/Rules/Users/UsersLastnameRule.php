<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersLastnameRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
			->addRule('lastName', function($field, $value, array $params, array $fields) {
				return preg_match("/^([a-zA-Z ]+)(\s[a-zA-Z ]+)*$/", $value);
			});

			$validator
			->rule("required", "users_lastname")
			->message("El apellido  es requerido");

			$validator
			->rule("lengthMin", "users_lastname", 2)
			->message("El apellido debe tener mínimo 2 caracteres");

			$validator
			->rule("lengthMax", "users_lastname", 25)
			->message("El apellido debe tener máximo 25 caracteres");

			$validator
			->rule("lastName", "users_lastname")
			->message("El apellido solo debe tener caracteres alfabeticos");
		});
	}

}