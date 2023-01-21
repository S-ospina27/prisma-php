<?php

namespace App\Rules\Departments;

use App\Traits\Framework\ShowErrors;

class DepartmentsNameRule {

	use ShowErrors;

	public static function passes(): void {
		self::validate(function(\Valitron\Validator $validator) {
			$validator->rule("", "")->message("");
		});
	}

}