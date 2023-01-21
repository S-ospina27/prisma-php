<?php

namespace App\Rules\ServiceOrders;

use App\Traits\Framework\ShowErrors;

class ServiceOrdersConsecutiveRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {

			$validator
			->rule("required", "service_orders_consecutive")
			->message("El consecutivo del servicio ti es requerido");

			$validator
			->rule("lengthMin", "service_orders_consecutive", 2)
			->message("El nombre del tipo de producto debe tener mínimo 2 caracteres");

			$validator
			->rule("lengthMax", "service_orders_consecutive", 25)
			->message("El nombre del tipo de producto debe tener máximo 25 caracteres");

			$validator
			->rule("name", "service_orders_consecutive")
			->message("El nombre solo debe tener caracteres alfabeticos");
		});
	}

}