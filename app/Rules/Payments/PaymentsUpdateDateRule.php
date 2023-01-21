<?php

namespace App\Rules\Payments;

use App\Traits\Framework\ShowErrors;

class PaymentsUpdateDateRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}