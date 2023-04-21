<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersAddressRule {

	use ShowErrors;

    public static string $field = "users_address";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			 $validator
                ->addRule('address', function($field, $value, array $params, array $fields) {
                    return preg_match("/^([a-zA-Z0-9-#, ]+)(\s[a-zA-Z0-9-#, ]+)*$/", $value);
                });

            $validator
                ->rule("required", self::$field)
                ->message("La dirección del usuario es requerida");

            $validator
                ->rule("lengthMin", self::$field, 10)
                ->message("La dirección del  usuario debe tener mínimo 10 caracteres");

            $validator
                ->rule("lengthMax", self::$field, 200)
                ->message("La dirección del  usuario debe tener máximo 200 caracteres");

            $validator
                ->rule("address", self::$field)
                ->message("La dirección de usuario solo debe tener caracteres alfabeticos y numericos");
		});
	}

}