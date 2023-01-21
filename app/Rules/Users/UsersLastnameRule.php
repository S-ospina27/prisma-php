<?php

namespace App\Rules\Users;

use App\Traits\Framework\ShowErrors;

class UsersLastnameRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}