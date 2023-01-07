<?php

namespace App\Models\ServiceOrders;

use LionSQL\Drivers\MySQL as DB;

class GraphicServiceOrdersModel {

	public function __construct() {
		
	}

    public function readAmountOrdersDB() {
        return DB::table(
            DB::alias('service_orders', 'so')
        )->select(
            DB::alias('idservice_states', 'so', true),
            DB::alias('service_type', 'st', true),
            DB::alias(DB::count('*'), 'cont')
        )->innerJoin(
            DB::alias('service_states', 'st'),
            DB::alias('idservice_states', 'so', true),
            DB::alias('idservice_states', 'st', true)
        )->where(
            DB::alias('idservice_states', 'so', true)
        )->in(
            3, 5, 8
        )->groupBy(
            DB::alias('idservice_states', 'so', true)
        )->getAll();
    }

    public function readUnitPercentagesDB() {
        return DB::table('service_orders')
            ->select(
                DB::alias(DB::count('*'), 'cont'),
                DB::alias(DB::sum('service_orders_not_defective_amount'), 'cont_success'),
                DB::alias(DB::sum('service_orders_defective_amount'), 'cont_err')
            )->get();
    }

}