<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class IdusersRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
			->rule("required", "idusers")
			->message("El usuario es  requerido");

			$validator
			->rule("integer", "idusers")
			->message("El  usuario no es valido");

			$validator
			->rule("min", "idusers", 1)
			->message("El usuario no es valido");
		});
	}

}