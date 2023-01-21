<?php

namespace App\Rules\ProductTypes;

use App\Traits\Framework\ShowErrors;

class IdproductTypesRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
			->rule("required", "idproduct_types")
			->message("El tipo de producto es  requerido");

			$validator
			->rule("integer", "idproduct_types")
			->message("El tipo de producto no es valido");

			$validator
			->rule("min", "idproduct_types", 1)
			->message("El tipo de producto no es valido");
		});
	}

}