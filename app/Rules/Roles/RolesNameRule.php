<?php

namespace App\Rules\Roles;

use App\Traits\Framework\ShowErrors;

class RolesNameRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}