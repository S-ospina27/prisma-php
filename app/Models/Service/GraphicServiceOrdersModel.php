<?php

namespace App\Models\Service;

use Database\Class\ReadServiceRequestDates;
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
            DB::alias(DB::sum('service_orders_amount'), 'cont'),
            DB::alias(DB::sum('service_orders_not_defective_amount'), 'cont_success'),
            DB::alias(DB::sum('service_orders_defective_amount'), 'cont_err')
        )->where('idservice_states')->in(1, 2, 3, 5, 6, 7, 8)->get();
    }

    public function readCountServiceRequestWarrantyDB() {
        return DB::table("service_request")
        ->select(DB::alias(DB::count('*'), 'cont'), "service_request_warranty")
        ->groupBy("service_request_warranty")
        ->getAll();
    }

    public function readTotalChargesPerMonthDB() {
        return DB::table('service_request')->select(
            DB::alias(DB::sum('service_request_value'), 'total_item'),
            DB::alias(DB::year('service_request_date_close'), 'year_item'),
            DB::alias(DB::month('service_request_date_close'), 'month_item')
        )
        ->where(DB::equalTo('service_request_warranty'), 'SI')
        ->groupBy(
            DB::year('service_request_date_close'),
            DB::month('service_request_date_close')
        )
        ->orderBy(
            DB::year('service_request_date_close') . DB::desc(true),
            DB::month('service_request_date_close') . DB::asc(true)
        )
        ->getAll();
    }

    public function readTotalChargesWithoutWarrantyDB() {
        return DB::table('service_request')->select(
            DB::alias(DB::sum('service_request_value'), 'total_item'),
            DB::alias(DB::year('service_request_date_close'), 'year_item'),
            DB::alias(DB::month('service_request_date_close'), 'month_item')
        )
        ->where(DB::equalTo('service_request_warranty'), 'NO')
        ->groupBy(
            DB::year('service_request_date_close'),
            DB::month('service_request_date_close')
        )
        ->orderBy(
            DB::year('service_request_date_close') . DB::desc(true),
            DB::month('service_request_date_close') . DB::asc(true)
        )
        ->getAll();
    }

    public function readAverageTimeDB(ReadServiceRequestDates $serviceRequestDates) {
         return DB::fetchClass(ReadServiceRequestDates::class)
            ->table("read_service_request_dates")
            ->select()
            ->where(DB::equalTo('idusers_technical'), $serviceRequestDates->getIdusersTechnical())
            ->orderBy('idservice_request' . DB::desc(true))
            ->limit(10)
            ->getAll();
    }

}