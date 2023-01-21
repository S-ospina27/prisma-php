<?php

namespace App\Rules\Payments;

use App\Traits\Framework\ShowErrors;

class PaymentsCreationDateRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}