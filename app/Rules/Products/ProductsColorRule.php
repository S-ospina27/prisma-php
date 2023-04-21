<?php

namespace App\Rules\Products;

use App\Traits\Framework\ShowErrors;

class ProductsColorRule {

	use ShowErrors;

    public static string $field = "products_color";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("El color  es requerido");

			$validator
                ->rule("lengthMin", self::$field, 2)
                ->message("El color  del  producto debe tener mínimo 4 caracteres");

			$validator
                ->rule("lengthMax", self::$field, 20)
                ->message("El color del  producto debe tener máximo 20 caracteres");
		});
	}

}