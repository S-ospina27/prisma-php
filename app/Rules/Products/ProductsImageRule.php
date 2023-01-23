<?php

namespace App\Rules\Products;

use App\Traits\Framework\ShowErrors;

class ProductsImageRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "products_image")
                ->message("La imagen del producto es requerida");

            $validator
                ->rule("array", "products_image")
                ->message("La imagen del producto no es válida");
		});
	}

}