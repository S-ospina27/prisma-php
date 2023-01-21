<?php

namespace App\Rules\Roles;

use App\Traits\Framework\ShowErrors;

class IdrolesRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}