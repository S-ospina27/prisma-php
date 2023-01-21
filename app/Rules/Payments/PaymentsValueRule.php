<?php

namespace App\Rules\Payments;

use App\Traits\Framework\ShowErrors;

class PaymentsValueRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
			->rule("required", "payments_value")
			->message("El valor  es requeridao");

			$validator
			->rule("integer", "payments_value")
			->message("El   valor  no es valido");

			$validator
			->rule("min", "payments_value", 1)
			->message("El valor  no es valido");
		});
	}

}