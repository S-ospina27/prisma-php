<?php

namespace App\Models;
use Database\Class\ServiceOrders;
use LionSql\Drivers\MySQLDriver as DB;


class Service_ordersModel {

	public function __construct() {
		
	}


	public function createOrdersDB(ServiceOrders $orders){

		return DB::call('create_services_orders',[
			$orders->getIdproducts(),
			$orders->getIdserviceStates(),
			$orders->getIdproviderUsers(),
			$orders->getServiceOrdersCreationDate(),
			$orders->getServiceOrdersDateDelivery(),
			$orders->getServiceOrdersFinishedProduct(),
			$orders->getServiceOrdersType(),
			$orders->getServiceOrdersConsecutive(),
			$orders->getServiceOrdersAmount(),
			$orders->getServiceOrdersDefectiveAmount(),
			$orders->getServiceOrdersObservation(),
			$orders->getServiceOrdersTotalPrice(),
			$orders->getServiceOrdersPendingAmount()
		])->execute();

	}

	public function updateOrdersDB(ServiceOrders $orders){

		return DB::call('update_services_orders',[
			$orders->getIdproducts(),
			$orders->getIdserviceStates(),
			$orders->getIdproviderUsers(),
			$orders->getServiceOrdersCreationDate(),
			$orders->getServiceOrdersDateDelivery(),
			$orders->getServiceOrdersFinishedProduct(),
			$orders->getServiceOrdersType(),
			$orders->getServiceOrdersConsecutive(),
			$orders->getServiceOrdersAmount(),
			$orders->getServiceOrdersDefectiveAmount(),
			$orders->getServiceOrdersObservation(),
			$orders->getServiceOrdersTotalPrice(),
			$orders->getServiceOrdersPendingAmount(),
			$orders->getIdserviceOrders()
		])->execute();

	}

	public function readOrdersDB(){
		return DB::table('read_service_orders')->select()->getAll();
	}

	public function readOrdersProviderDB($idprovider_users) {
		return DB::table('read_service_orders')
			->select()
			->where(DB::equalTo('idprovider_users'),$idprovider_users)
			->getAll();
	}

	public function exportServiceOrdersDB(object $dates){
		return DB::table('read_service_orders')
			->select()
			->where('service_orders_creation_date')
			->between($dates->date_start, $dates->date_end)
			->getAll();

	}



}