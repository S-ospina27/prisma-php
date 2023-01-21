<?php

namespace App\Rules\Products;

use App\Traits\Framework\ShowErrors;

class IdproductsRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}