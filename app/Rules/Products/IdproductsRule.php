<?php

namespace App\Rules\Products;

use App\Traits\Framework\ShowErrors;

class IdproductsRule {

	use ShowErrors;

    public static string $field = "idproducts";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("El producto es requerido");

            $validator
                ->rule("integer", self::$field)
                ->message("El producto no es valido");

            $validator
                ->rule("min", self::$field, 1)
                ->message("El producto no es valido");
		});
	}

}