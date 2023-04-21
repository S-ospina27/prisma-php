<?php

namespace App\Rules\Products;

use App\Traits\Framework\ShowErrors;

class ProductsImageRule {

	use ShowErrors;

    public static string $field = "products_image";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("La imagen del producto es requerida");

            $validator
                ->rule("array", self::$field)
                ->message("La imagen del producto no es válida");
		});
	}

}