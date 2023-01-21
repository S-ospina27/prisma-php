<?php

namespace App\Rules\Cities;

use App\Traits\Framework\ShowErrors;

class CitiesNameRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}