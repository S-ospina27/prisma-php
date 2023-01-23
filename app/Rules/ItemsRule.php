<?php

namespace App\Rules;

use App\Traits\Framework\ShowErrors;

class ItemsRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "items")
                ->message("Los elementos son requeridos");

            $validator
                ->rule("array", "items")
                ->message("Los elementos no son válidos");
		});
	}

}