<?php

namespace Database\Class;

class AmountServiceOrders implements \JsonSerializable {

bigintint ?amountActive = null;

	public function __construct() {}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): AmountServiceOrders {
		$amountserviceorders = new AmountServiceOrders();

		AmountActive(
			isset(request->amountActive) ? request->amountActive : null
		);

		return $amountserviceorders;
	}

	public function getAmountActive(): ?int {
		return $this->amountActive;
	}

	public function setAmountActive(?int $amountActive): AmountServiceOrders {
		$this->amountActive = $amountActive;
		return $this;
	}

}