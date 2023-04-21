<?php

namespace App\Rules\ProductTypes;

use App\Traits\Framework\ShowErrors;

class IdproductTypesRule {

	use ShowErrors;

    public static string $field = "idproduct_types";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->rule("required", self::$field)
    			->message("El tipo de producto es  requerido");

			$validator
    			->rule("integer", self::$field)
    			->message("El tipo de producto no es valido");

			$validator
    			->rule("min", self::$field, 1)
    			->message("El tipo de producto no es valido");
		});
	}

}