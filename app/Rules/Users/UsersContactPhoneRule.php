<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersContactPhoneRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("optional", "users_contact_phone");

			$validator
    			->rule("lengthMin", "users_contact_phone", 10)
    			->message("El telefono debe tener mínimo 10 caracteres");

			$validator
    			->rule("lengthMax", "users_contact_phone", 10)
    			->message("El telefono debe tener máximo 10 caracteres");
		});
	}

}