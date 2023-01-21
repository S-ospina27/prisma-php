<?php

namespace App\Rules\Products;

use App\Traits\Framework\ShowErrors;

class ProductsColorRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
			->rule("required", "products_color")
			->message("El color  es requerido");

			$validator
			->rule("lengthMin", "products_color", 2)
			->message("El color  del  producto debe tener mínimo 4 caracteres");

			$validator
			->rule("lengthMax", "products_color", 20)
			->message("El color del  producto debe tener máximo 20 caracteres");
		});
	}

}