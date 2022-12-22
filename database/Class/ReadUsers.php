<?php

namespace Database\Class;

class ReadUsers implements \JsonSerializable {


	public function __construct() {}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadUsers {
		
	}

}