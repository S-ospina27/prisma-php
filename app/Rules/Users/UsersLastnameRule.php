<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersLastnameRule {

	use ShowErrors;

    public static string $field = "users_lastname";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->addRule('lastName', function($field, $value, array $params, array $fields) {
    				return preg_match("/^([a-zA-Z ]+)(\s[a-zA-Z ]+)*$/", $value);
    			});

			$validator
    			->rule("required", self::$field)
    			->message("El apellido  es requerido");

			$validator
    			->rule("lengthMin", self::$field, 2)
    			->message("El apellido debe tener mínimo 2 caracteres");

			$validator
    			->rule("lengthMax", self::$field, 25)
    			->message("El apellido debe tener máximo 25 caracteres");

			$validator
    			->rule("lastName", self::$field)
    			->message("El apellido solo debe tener caracteres alfabeticos");
		});
	}

}