<?php

namespace App\Rules\ServiceRequest;

use App\Traits\Framework\ShowErrors;

class ServiceRequestTechnicalNoveltyRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			if ((int) request->idservice_states === 9) {
                $validator->rule("", "")->message("");
            }
		});
	}

}