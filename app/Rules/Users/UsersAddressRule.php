<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersAddressRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			 $validator
                ->addRule('address', function($field, $value, array $params, array $fields) {
                    return preg_match("/^([a-zA-Z0-9-#, ]+)(\s[a-zA-Z0-9-#, ]+)*$/", $value);
                });

            $validator
                ->rule("required", "users_address")
                ->message("La dirección del usuario es requerida");

            $validator
                ->rule("lengthMin", "users_address", 10)
                ->message("La dirección del  usuario debe tener mínimo 10 caracteres");

            $validator
                ->rule("lengthMax", "users_address", 200)
                ->message("La dirección del  usuario debe tener máximo 200 caracteres");

            $validator
                ->rule("address", "users_address")
                ->message("La dirección de usuario solo debe tener caracteres alfabeticos y numericos");
		});
	}

}