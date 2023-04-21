<?php

namespace App\Rules\ProductTypes;

use App\Traits\Framework\ShowErrors;

class ProductTypesNameRule {

	use ShowErrors;

    public static string $field = "product_types_name";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
    			->addRule('types_name', function($field, $value, array $params, array $fields) {
    				return preg_match("/^([a-zA-Z0-9 ,-]+)(\s[a-zA-Z0-9 ,-]+)*$/", $value);
    			});

			$validator
    			->rule("required", self::$field)
    			->message("El tipo de producto es requerido");

			$validator
    			->rule("lengthMin", self::$field, 2)
    			->message("El tipo de producto debe tener mínimo 2 caracteres");

			$validator
    			->rule("lengthMax", self::$field, 45)
    			->message("El tipo de producto debe tener máximo 45 caracteres");

			$validator
    			->rule("types_name", self::$field)
    			->message("El tipo de producto solo debe tener caracteres alfa-numéricos ('A-Z', '0-9', ',-')");
		});
	}

}