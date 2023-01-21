<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class ServiceRequestTroubleReportRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->addRule('trouble_report', function($field, $value, array $params, array $fields) {
                    return preg_match("/^([a-zA-Z0-9, ]+)(\s[a-zA-Z0-9, ]+)*$/", $value);
                });

            $validator
                ->rule("required", "service_request_trouble_report")
                ->message("El reporte del cliente es requerido");

            $validator
                ->rule("lengthMin", "service_request_trouble_report", 8)
                ->message("El reporte del cliente debe tener mínimo 8 caracteres");

            $validator
                ->rule("lengthMax", "service_request_trouble_report", 256)
                ->message("El reporte del cliente debe tener máximo 256 caracteres");

            $validator
                ->rule("trouble_report", "service_request_trouble_report")
                ->message("El reporte del cliente solo debe tener caracteres alfabeticos y numericos");
		});
	}

}