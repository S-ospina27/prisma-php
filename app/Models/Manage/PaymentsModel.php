<?php

namespace App\Models\Manage;

use Database\Class\Payments;
use LionSQL\Drivers\MySQL as DB;

class PaymentsModel {

	public function __construct() {
		
	}

    public function createPaymentsDB(Payments $payments) {
        return DB::call("create_payments", [
            $payments->getIdserviceRequest(),
            $payments->getIdserviceStates(),
            $payments->getPaymentsValue(),
            $payments->getPaymentsCreationDate()
        ])->execute();
    }

    public function readPaymentsDB() {
        return DB::table("read_payments")
            ->select()
            ->getAll();
    }

    public function updatePaymentsMassiveDB(array $items) {
        return DB::table('payments')
            ->update(['idservice_states' => 10])
            ->where('idpayments')
            ->in(...$items)
            ->execute();
    }

}