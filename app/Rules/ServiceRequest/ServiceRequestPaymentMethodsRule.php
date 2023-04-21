<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class ServiceRequestPaymentMethodsRule {

	use ShowErrors;

    public static string $field = "service_request_payment_methods";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			if((int) request->idservice_states === 8) {
				$validator
				    ->rule("required", self::$field)
				    ->message("El  metodo de pago es requerido");

				$validator
				    ->rule("in", self::$field, ["EFECTIVO", "TRANSFERENCIA"])
				    ->message("El metodo de pago no existe");
			}
		});
	}

}