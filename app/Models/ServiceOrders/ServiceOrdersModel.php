<?php

namespace App\Models\ServiceOrders;

use Database\Class\ReadServiceOrders;
use Database\Class\ServiceOrders;
use LionSql\Drivers\MySQL as DB;

class ServiceOrdersModel {

	public function __construct() {
		
	}

	public function createServiceOrdersDB(ServiceOrders $serviceOrders) {
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
			$serviceOrders->getServiceOrdersNotDefectiveAmount(),
			$serviceOrders->getServiceOrdersObservation(),
			$serviceOrders->getServiceOrdersTotalPrice(),
			$serviceOrders->getServiceOrdersPendingAmount(),
            $serviceOrders->getServiceOrdersCode()
		])->execute();
	}

	public function updateServiceOrdersDB(ServiceOrders $serviceOrders) {
		return DB::call('update_services_orders', [
			$serviceOrders->getIdproducts(),
			$serviceOrders->getIdserviceStates(),
            $serviceOrders->getIdusers(),
			$serviceOrders->getServiceOrdersDateDelivery(),
			$serviceOrders->getServiceOrdersFinishedProduct(),
			$serviceOrders->getServiceOrdersType(),
			$serviceOrders->getServiceOrdersConsecutive(),
			$serviceOrders->getServiceOrdersAmount(),
			$serviceOrders->getServiceOrdersDefectiveAmount(),
			$serviceOrders->getServiceOrdersNotDefectiveAmount(),
			$serviceOrders->getServiceOrdersObservation(),
			$serviceOrders->getServiceOrdersTotalPrice(),
			$serviceOrders->getServiceOrdersPendingAmount(),
			$serviceOrders->getIdserviceOrders()
		])->execute();
	}

	public function readOrdersDB() {
		return DB::table('read_service_orders')
            ->select()
            ->getAll();
	}

    public function readServiceOrdersByIdDB(ServiceOrders $serviceOrders): ReadServiceOrders {
        return DB::fetchClass(ReadServiceOrders::class)
            ->table('read_service_orders')
            ->select()
            ->where(DB::equalTo('idservice_orders'), $serviceOrders->getIdserviceOrders())
            ->get();
    }

    public function readServiceOrdersByCodeDB(ServiceOrders $serviceOrders): ReadServiceOrders {
        return DB::fetchClass(ReadServiceOrders::class)
            ->table('read_service_orders')
            ->select()
            ->where(DB::equalTo('service_orders_code'), $serviceOrders->getServiceOrdersCode())
            ->get();
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