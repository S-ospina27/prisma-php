<?php

namespace App\Http\Controllers\Service;

use App\Models\Service\GraphicServiceOrdersModel;
use LionHelpers\Arr;
use Database\Class\ServiceRequest;
use Database\Class\ServiceRequestDates;

class GraphicServiceOrdersController {

    private GraphicServiceOrdersModel $graphicServiceOrdersModel;

    public function __construct() {
        $this->graphicServiceOrdersModel = new GraphicServiceOrdersModel();
    }

    public function readAmountOrders() {
        $amountOrders = $this->graphicServiceOrdersModel->readAmountOrdersDB();

        if (isset($amountOrders->status)) {
            return $amountOrders;
        }

        return Arr::of($amountOrders)->keyBy('service_type');
    }

    public function readUnitPercentages() {
        return $this->graphicServiceOrdersModel->readUnitPercentagesDB();
    }

    public function readCountServiceRequestWarranty() {
        return $this->graphicServiceOrdersModel->readCountServiceRequestWarrantyDB();
    }

    public function readTotalChargesPerMonth() {
        $data = $this->graphicServiceOrdersModel->readTotalChargesPerMonthDB();
        return !isset($data->status) ? Arr::of($data)->tree('year_item') : [];
    }

    public function readTotalChargesWithoutWarranty() {
        $data = $this->graphicServiceOrdersModel->readTotalChargesWithoutWarrantyDB();
        return !isset($data->status) ? Arr::of($data)->tree('year_item') : [];
    }

    public function readAverageTime($idusers_technical) {
        $serviceRequestDates = ServiceRequestDates::formFields()
            ->setIdusersTechnical((int) $idusers_technical);

        $readDates = $this->graphicServiceOrdersModel->readAverageTimeDB($serviceRequestDates);

        if (isset($readDates->status)) {
            return $readDates;
        }

        return $readDates;
    }

}