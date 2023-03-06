<?php

namespace App\Models\Service;

use Database\Class\ReadServiceRequestDates;
use LionSQL\Drivers\MySQL as DB;

class GraphicServiceOrdersModel {

	public function __construct() {
		
	}

    public function readAmountOrdersDB() {
        return DB::table(
            DB::as('service_orders', 'so')
        )->select(
            DB::column('idservice_states', 'so'),
            DB::column('service_type', 'st'),
            DB::as(DB::count('*'), 'cont')
        )->innerJoin(
            DB::as('service_states', 'st'),
            DB::column('idservice_states', 'so'),
            DB::column('idservice_states', 'st')
        )->where(
            DB::column('idservice_states', 'so')
        )->in(
            3, 5, 8
        )->groupBy(
            DB::column('idservice_states', 'so')
        )->getAll();
    }

    public function readUnitPercentagesDB() {
        return DB::table('service_orders')
            ->select(
                DB::as(DB::sum('service_orders_amount'), 'cont'),
                DB::as(DB::sum('service_orders_not_defective_amount'), 'cont_success'),
                DB::as(DB::sum('service_orders_defective_amount'), 'cont_err')
            )->where('idservice_states')->in(1, 2, 3, 5, 6, 7, 8)->get();
    }

    public function readCountServiceRequestWarrantyDB() {
        return DB::table("service_request")
            ->select(DB::as(DB::count('*'), 'cont'), "service_request_warranty")
            ->groupBy("service_request_warranty")
            ->getAll();
    }

    public function readTotalChargesPerMonthDB() {
        return DB::table('service_request')->select(
            DB::as(DB::sum('service_request_value'), 'total_item'),
            DB::as(DB::year('service_request_date_close'), 'year_item'),
            DB::as(DB::month('service_request_date_close'), 'month_item')
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
            DB::as(DB::sum('service_request_value'), 'total_item'),
            DB::as(DB::year('service_request_date_close'), 'year_item'),
            DB::as(DB::month('service_request_date_close'), 'month_item')
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