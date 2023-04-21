<?php

namespace App\Rules\SpareParts;

use App\Traits\Framework\ShowErrors;

class SparePartsAmountRule {

	use ShowErrors;

    public static string $field = "spare_parts_amount";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->rule("required", self::$field)
    			->message("La cantidad  es  requerida");

			$validator
    			->rule("integer", self::$field)
    			->message("La cantidad no es valida");
		});
	}

}