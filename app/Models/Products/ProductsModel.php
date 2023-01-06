<?php

namespace App\Models\Products;

use Database\Class\Products;
use LionSql\Drivers\MySQL as DB;

class ProductsModel {

	public function __construct() {
		
	}

	public function createProductsDB(Products $products) {
		return DB::call('create_products', [
			$products->getProductsReference(),
			$products->getIdproductTypes(),
			$products->getProductsImage(),
			$products->getProductsDescription(),
			$products->getProductsColor(),
			$products->getIdusers(),
			$products->getIdstatus()
		])->execute();
	}

	public function updateProductsDB(Products $products) {
		return DB::call('update_products', [
			$products->getProductsReference(),
			$products->getIdproductTypes(),
			$products->getProductsImage(),
			$products->getProductsDescription(),
			$products->getProductsColor(),
			$products->getIdusers(),
			$products->getIdstatus(),
			$products->getIdproducts()
		])->execute();

	}

	public function	readProductsDB() {
		return DB::table('read_products')->select()->getAll();
	}

}