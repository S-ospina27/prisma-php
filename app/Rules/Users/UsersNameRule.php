<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersNameRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->addRule('name', function($field, $value, array $params, array $fields) {
    				return preg_match("/^([a-zA-Z ]+)(\s[a-zA-Z ]+)*$/", $value);
    			});

			$validator
                ->rule("required", "users_name")
                ->message("El nombre  es requerido");

			$validator
                ->rule("lengthMin", "users_name", 2)
                ->message("El nombre debe tener mínimo 2 caracteres");

			$validator
                ->rule("lengthMax", "users_name", 25)
                ->message("El nombre debe tener máximo 25 caracteres");

			$validator
                ->rule("name", "users_name")
                ->message("El nombre solo debe tener caracteres alfabeticos");
		});
	}

}