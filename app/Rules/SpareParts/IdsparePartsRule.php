<?php

namespace App\Rules\SpareParts;

use App\Traits\Framework\ShowErrors;

class IdsparePartsRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}