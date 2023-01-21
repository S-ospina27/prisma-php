<?php

namespace App\Rules\ServiceOrders;

use App\Traits\Framework\ShowErrors;

class ServiceOrdersCreationDateRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {

			$validator
			->rule("required", "service_orders_creation_date")
			->message("la fecha es requerido");

			$validator
			->rule("dateFormat" , "service_orders_creation_date" , "Y-m-d")
			->message("la fecga debe cumplir con el formato año-mes-dia");

		});
	}

}