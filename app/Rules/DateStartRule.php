<?php

namespace App\Rules;

use App\Traits\Framework\ShowErrors;
use Carbon\Carbon;

class DateStartRule {

	use ShowErrors;

    public static string $field = "date_start";

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", self::$field)
                ->message("La fecha inicio es requerida");

            $validator
                ->rule("date", self::$field)
                ->message("La fecha inicio no es una fecha valida");

            $validator
                ->rule("dateFormat", self::$field, "Y-m-d")
                ->message("La fecha inicio no tiene el formato correcto (año-mes-día)");

            $validator
                ->rule("dateBefore", self::$field, Carbon::now()->addDay()->format("Y-m-d"))
                ->message("La fecha inicio debe ser igual o anterior a la fecha actual");

            $validator
                ->rule("dateAfter", self::$field, '2022-12-31')
                ->message("La fecha inicio debe partir desde el '2023-01-01'");
		});
	}

}