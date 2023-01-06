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
        return Arr::of(
            $this->graphicServiceOrdersModel->readAmountOrdersDB()
        )->keyBy('service_type');
    }

}