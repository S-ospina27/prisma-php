<?php

namespace App\Rules\Payments;

use App\Traits\Framework\ShowErrors;

class IdpaymentsRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
            $validator
                ->rule("required", "idpayments")
                ->message("El pago es requerido");

            $validator
                ->rule("integer", "idpayments")
                ->message("El pago no es válido");

            $validator
                ->rule("min", "idpayments", 1)
                ->message("El pago no es válido");
        });
	}

}