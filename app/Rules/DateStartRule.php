<?php

namespace App\Rules;

use App\Traits\Framework\ShowErrors;
use Carbon\Carbon;

class DateStartRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "date_start")
                ->message("La fecha inicio es requerida");

            $validator
                ->rule("date", "date_start")
                ->message("La fecha inicio no es una fecha valida");

            $validator
                ->rule("dateFormat", "date_start", "Y-m-d")
                ->message("La fecha inicio no tiene el formato correcto (año-mes-día)");

            $validator
                ->rule("dateBefore", "date_start", Carbon::now()->addDay()->format("Y-m-d"))
                ->message("La fecha inicio debe ser igual o anterior a la fecha actual");

            $validator
                ->rule("dateAfter", "date_start", '2022-12-31')
                ->message("La fecha inicio debe partir desde el '2023-01-01'");
		});
	}

}