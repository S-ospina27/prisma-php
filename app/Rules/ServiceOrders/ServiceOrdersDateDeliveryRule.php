<?php

namespace App\Rules\ServiceOrders;

use App\Traits\Framework\ShowErrors;

class ServiceOrdersDateDeliveryRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}