<?php

namespace App\Rules\TechnicalInventory;

use App\Traits\Framework\ShowErrors;

class TechnicalInventoryAmountRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}