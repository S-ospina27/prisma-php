<?php

namespace App\Rules\ServiceStates;

use App\Traits\Framework\ShowErrors;

class ServiceTypeRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}