<?php

namespace App\Rules\SpareParts;

use App\Traits\Framework\ShowErrors;

class SparePartsNameRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
			->addRule('name', function($field, $value, array $params, array $fields) {
				return preg_match("/^([a-zA-Z ]+)(\s[a-zA-Z ]+)*$/", $value);
			});

			$validator
			->rule("required", "spare_parts_name")
			->message("El nombre del repuesto  es requerido");

			$validator
			->rule("lengthMin", "spare_parts_name", 2)
			->message("El nombre del repuesto debe tener mínimo 2 caracteres");

			$validator
			->rule("lengthMax", "spare_parts_name", 25)
			->message("El nombre del repuesto debe tener máximo 25 caracteres");

			$validator
			->rule("name", "spare_parts_name")
			->message("El nombre del repuesto solo debe tener caracteres alfabeticos");
		});
	}

}