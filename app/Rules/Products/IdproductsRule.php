<?php

namespace App\Rules\Products;

use App\Traits\Framework\ShowErrors;

class IdproductsRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "idproducts")
                ->message("El producto es requerido");

            $validator
                ->rule("integer", "idproducts")
                ->message("El producto no es valido");

            $validator
                ->rule("min", "idproducts", 1)
                ->message("El producto no es valido");
		});
	}

}