<?php

namespace App\Rules\TechnicalInventory;

use App\Traits\Framework\ShowErrors;

class TechnicalInventoryQuantityAvailableRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
			->rule("required", "technical_inventory_quantity_available")
			->message("La cantidad  es  requerida");

			$validator
			->rule("integer", "technical_inventory_quantity_available")
			->message("La cantidad no es valida");

			$validator
			->rule("min", "technical_inventory_quantity_available", 1)
			->message("La cantidad no es valido");
		});
	}

}