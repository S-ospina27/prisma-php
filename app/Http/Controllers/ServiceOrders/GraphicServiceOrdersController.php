<?php

namespace App\Http\Controllers\ServiceOrders;

use App\Models\ServiceOrders\GraphicServiceOrdersModel;
use LionHelpers\Arr;

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

}