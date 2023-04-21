<?php

namespace App\Rules;

use App\Traits\Framework\ShowErrors;

class ItemsRule {

	use ShowErrors;

    public static string $field = "items";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("Los elementos son requeridos");

            $validator
                ->rule("array", self::$field)
                ->message("Los items no son válidos, debe enviar un array de items seleccionados");
		});
	}

}