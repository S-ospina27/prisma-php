<?php

namespace App\Rules\ProductTypes;

use App\Traits\Framework\ShowErrors;

class ProductTypesNameRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}