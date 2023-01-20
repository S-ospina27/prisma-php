<?php

namespace App\Http\Controllers\Manage;

use App\Models\Manage\PaymentsModel;
use Carbon\Carbon;
use Database\Class\Payments;

class PaymentsController {

    private PaymentsModel $paymentsModel;

	public function __construct() {
        $this->paymentsModel = new PaymentsModel();
	}

    public function createPayments() {
        $responseCreate = $this->paymentsModel->createPaymentsDB(
            Payments::formFields()
                ->setIdserviceStates(6)
                ->setPaymentsCreationDate(Carbon::now()->format("Y-m-d H:i:s"))
        );

        if ($responseCreate->status === 'database-error') {
            return response->error("Ocurrió un error al crear el pago");
        }

        return response->success("Pago creado correctamente");
    }

    public function readPayments() {
        return $this->paymentsModel->readPaymentsDB();
    }

}