<?php

namespace App\Rules\SpareParts;

use App\Traits\Framework\ShowErrors;

class SparePartsAmountRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->rule("required", "spare_parts_amount")
    			->message("La cantidad  es  requerida");

			$validator
    			->rule("integer", "spare_parts_amount")
    			->message("La cantidad no es valida");
		});
	}

}