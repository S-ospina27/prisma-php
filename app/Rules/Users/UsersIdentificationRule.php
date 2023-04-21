<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersIdentificationRule {

	use ShowErrors;

    public static string $field = "users_identification";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
            $validator
                ->rule("required", self::$field)
                ->message("El  numero de identificación es  requerido");

			$validator
    			->rule("integer", self::$field)
    			->message("El numero de identificación valido");

			$validator
                ->rule("lengthMin", self::$field, 8)
                ->message("El numero de identificación debe contener minimo 8 caracteres");

			$validator
                ->rule("lengthMax", self::$field, 10)
                ->message("El numero de identificación debe contener maximo 10 caracteres");
		});
	}

}