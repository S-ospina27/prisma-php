<?php

namespace App\Models;
use Database\Class\ServiceOrders;
use LionSql\Drivers\MySQLDriver as DB;

class ServiceOrdersModel {

	public function __construct() {
		
	}

	public function createOrdersDB(ServiceOrders $serviceOrders) {
		return DB::call('create_services_orders', [
			$serviceOrders->getIdproducts(),
			$serviceOrders->getIdserviceStates(),
			$serviceOrders->getIdusers(),
			$serviceOrders->getServiceOrdersCreationDate(),
			$serviceOrders->getServiceOrdersDateDelivery(),
			$serviceOrders->getServiceOrdersFinishedProduct(),
			$serviceOrders->getServiceOrdersType(),
			$serviceOrders->getServiceOrdersConsecutive(),
			$serviceOrders->getServiceOrdersAmount(),
			$serviceOrders->getServiceOrdersDefectiveAmount(),
			$serviceOrders->getServiceOrdersObservation(),
			$serviceOrders->getServiceOrdersTotalPrice(),
			$serviceOrders->getServiceOrdersPendingAmount()
		])->execute();
	}

	public function updateOrdersDB(ServiceOrders $serviceOrders) {
		return DB::call('update_services_orders', [
			$serviceOrders->getIdproducts(),
			$serviceOrders->getIdserviceStates(),
            $serviceOrders->getIdusers(),
			$serviceOrders->getServiceOrdersCreationDate(),
			$serviceOrders->getServiceOrdersDateDelivery(),
			$serviceOrders->getServiceOrdersFinishedProduct(),
			$serviceOrders->getServiceOrdersType(),
			$serviceOrders->getServiceOrdersConsecutive(),
			$serviceOrders->getServiceOrdersAmount(),
			$serviceOrders->getServiceOrdersDefectiveAmount(),
			$serviceOrders->getServiceOrdersObservation(),
			$serviceOrders->getServiceOrdersTotalPrice(),
			$serviceOrders->getServiceOrdersPendingAmount(),
			$serviceOrders->getIdserviceOrders()
		])->execute();
	}

	public function readOrdersDB() {
		return DB::table('read_service_orders')->select()->getAll();
	}

	public function readOrdersProviderDB($idprovider_users) {
        return DB::table('read_service_orders')
            ->select()
            ->where(DB::equalTo('idprovider_users'), $idprovider_users)
            ->getAll();
    }

    public function exportServiceOrdersDB(object $dates) {
        return DB::table('read_service_orders')
            ->select()
            ->where('service_orders_creation_date')
            ->between($dates->date_start, $dates->date_end)
            ->getAll();
    }

}