<?php

namespace App\Rules\DocumentTypes;

use App\Traits\Framework\ShowErrors;

class IddocumentTypesRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}