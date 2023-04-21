<?php

namespace App\Rules\TechnicalInventory;

use App\Traits\Framework\ShowErrors;

class IdtechnicalInventoryRule {

	use ShowErrors;

    public static string $field = "idtechnical_inventory";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("El inventario es requerido");

            $validator
                ->rule("integer", self::$field)
                ->message("El inventario no es válido");

            $validator
                ->rule("min", self::$field, 1)
                ->message("El inventario no es válido");
		});
	}

}