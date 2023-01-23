<?php

namespace App\Rules\TechnicalInventory;

use App\Traits\Framework\ShowErrors;

class IdtechnicalInventoryRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "idtechnical_inventory")
                ->message("El inventario es requerido");

            $validator
                ->rule("integer", "idtechnical_inventory")
                ->message("El inventario no es válido");

            $validator
                ->rule("min", "idtechnical_inventory", 1)
                ->message("El inventario no es válido");
		});
	}

}