<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class ServiceRequestTroubleReportRule {

	use ShowErrors;

    public static string $field = "service_request_trouble_report";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->addRule('trouble_report', function($field, $value, array $params, array $fields) {
                    return preg_match("/^([a-zA-Z0-9, ]+)(\s[a-zA-Z0-9, ]+)*$/", $value);
                });

            $validator
                ->rule("required", self::$field)
                ->message("El reporte del cliente es requerido");

            $validator
                ->rule("lengthMin", self::$field, 8)
                ->message("El reporte del cliente debe tener mínimo 8 caracteres");

            $validator
                ->rule("lengthMax", self::$field, 256)
                ->message("El reporte del cliente debe tener máximo 256 caracteres");

            $validator
                ->rule("trouble_report", self::$field)
                ->message("El reporte del cliente solo debe tener caracteres alfabeticos y numericos");
		});
	}

}