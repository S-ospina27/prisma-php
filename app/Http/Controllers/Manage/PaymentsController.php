<?php

namespace App\Http\Controllers\Manage;

use App\Models\Manage\PaymentsModel;
use App\Models\Service\ServiceRequestModel;
use Carbon\Carbon;
use Database\Class\Payments;
use Database\Class\ServiceRequest;

class PaymentsController {

    private PaymentsModel $paymentsModel;
    private ServiceRequestModel $serviceRequestModel;

	public function __construct() {
        $this->paymentsModel = new PaymentsModel();
        $this->serviceRequestModel = new ServiceRequestModel();
	}

    public function createPayments() {
        $readServiceRequest = $this->serviceRequestModel->readServiceRequestByIdDB(
            ServiceRequest::formFields()
        );

        $responseCreate = $this->paymentsModel->createPaymentsDB(
            Payments::formFields()
                ->setIdserviceStates(6)
                ->setPaymentsCreationDate(Carbon::now()->format("Y-m-d H:i:s"))
                ->setPaymentsUpdateDate(Carbon::now()->format("Y-m-d H:i:s"))
                ->setPaymentsValue($readServiceRequest->getServiceRequestValue())
        );

        if ($responseCreate->status === 'database-error') {
            return response->error("Ocurrió un error al crear el pago");
        }

        return response->success("Pago creado correctamente");
    }

    public function readPayments() {
        return $this->paymentsModel->readPaymentsDB();
    }

    public function updatePaymentsMassive() {
        $responseUpdate = $this->paymentsModel->updatePaymentsMassiveDB(
            request->items,
            Carbon::now()->format('Y-m-d H:i:s')
        );

        if ($responseUpdate->status === 'database-error') {
            return response->error("Ocurrió un error al actualizar los pagos");
        }

        return response->success("Pagos actualizados correctamente");
    }

}