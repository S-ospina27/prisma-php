<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class IdusersTechnicalRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}