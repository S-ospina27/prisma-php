<?php

namespace App\Rules\Status;

use App\Traits\Framework\ShowErrors;

class IdstatusRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}