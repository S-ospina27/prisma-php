<?php

namespace App\Rules;

use App\Traits\Framework\ShowErrors;
use Carbon\Carbon;

class DateEndRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator
                ->rule("required", "date_end")
                ->message("La fecha fin es requerida");

            $validator
                ->rule("date", "date_end")
                ->message("La fecha fin no es una fecha valida");

            $validator
                ->rule("dateFormat", "date_end", "Y-m-d")
                ->message("La fecha fin no tiene el formato correcto");

            $validator
                ->rule("dateBefore", "date_end", Carbon::now()->addDay()->format('Y-m-d'))
                ->message("La fecha fin debe ser igual o anterior a la fecha actual");

            $validator
                ->rule("dateAfter", "date_end", Carbon::parse(request->date_start)->subDay()->format('Y-m-d'))
                ->message("La fecha fin debe partir desde el '" . request->date_start . "'");
		});
	}

}