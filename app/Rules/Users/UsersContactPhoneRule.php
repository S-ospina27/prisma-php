<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersContactPhoneRule {

	use ShowErrors;

    public static string $field = "users_contact_phone";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("optional", self::$field);

			$validator
    			->rule("lengthMin", self::$field, 10)
    			->message("El telefono debe tener mínimo 10 caracteres");

			$validator
    			->rule("lengthMax", self::$field, 10)
    			->message("El telefono debe tener máximo 10 caracteres");
		});
	}

}