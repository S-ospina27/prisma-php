<?php

namespace App\Rules\Products;

use App\Traits\Framework\ShowErrors;

class ProductsReferenceRule {

	use ShowErrors;

    public static string $field = "products_reference";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->addRule('Reference', function($field, $value, array $params, array $fields) {
    				return preg_match("/^([a-zA-Z0-9 ,]+)(\s[a-zA-Z0-9 ,]+)*$/", $value);
    			});

			$validator
    			->rule("required", self::$field)
    			->message("La referencia del producto es requerida");

			$validator
    			->rule("lengthMin", self::$field, 2)
    			->message("La referencia del  producto debe tener mínimo 2 caracteres");

			$validator
    			->rule("lengthMax", self::$field, 20)
    			->message("La referencia del  producto debe tener máximo 20 caracteres");

			$validator
    			->rule("Reference", self::$field)
    			->message("La referencia del producto solo debe tener caracteres alfabeticos y numericos y guiones");
		});
	}

}