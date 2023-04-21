<?php

namespace App\Rules\Products;

use App\Traits\Framework\ShowErrors;

class ProductsDescriptionRule {

	use ShowErrors;

    public static string $field = "products_description";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->addRule('description', function($field, $value, array $params, array $fields) {
    				return preg_match("/^([a-zA-Z0-9 ,]+)(\s[a-zA-Z0-9 ,]+)*$/", $value);
    			});

			$validator
    			->rule("lengthMin", self::$field, 2)
    			->message("La description del  producto debe tener mínimo 2 caracteres");

			$validator
    			->rule("lengthMax", self::$field, 255)
    			->message("La referencia del  producto debe tener máximo 255 caracteres");

			$validator
    			->rule("Reference", self::$field)
    			->message("La referencia del producto solo debe tener caracteres alfabeticos y numericos");
		});
	}

}