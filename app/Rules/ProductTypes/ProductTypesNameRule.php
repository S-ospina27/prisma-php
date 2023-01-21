<?php

namespace App\Rules\ProductTypes;

use App\Traits\Framework\ShowErrors;

class ProductTypesNameRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
			->addRule('name', function($field, $value, array $params, array $fields) {
				return preg_match("/^([a-zA-Z ]+)(\s[a-zA-Z ]+)*$/", $value);
			});

			$validator
			->rule("required", "product_types_name")
			->message("El nombre del tipo de producto es requerido");

			$validator
			->rule("lengthMin", "product_types_name", 2)
			->message("El nombre del tipo de producto debe tener mínimo 2 caracteres");

			$validator
			->rule("lengthMax", "product_types_name", 25)
			->message("El nombre del tipo de producto debe tener máximo 25 caracteres");

			$validator
			->rule("name", "product_types_name")
			->message("El nombre solo debe tener caracteres alfabeticos");
		});
	}

}