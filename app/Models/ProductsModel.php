<?php

namespace App\Models;
use Database\Class\Products;
use Database\Class\ProductTypes;
use LionSql\Drivers\MySQLDriver as DB;

class ProductsModel {

	public function __construct() {
		
	}

	public function createProductsDB(Products $products){
		return DB::call('createProducts', [
			$products->getProductsReference(),
			$products->getIdproductTypes(),
			$products->getProductsImage(),
			$products->getProductsDescription(),
			$products->getProductsColor(),
			$products->getIdusers(),
			$products->getIdstatus()
		])->execute();
	}

	public function updateProductsDB(Products $products){
		return DB::call('updateProducts', [
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

	public function	readProductsDB(){
		return DB::table('read_products')->select()->getAll();
	}

// ----------------------------------product_type--------------------------------------------

	public function create_product_typeDB(ProductTypes $type){

		return DB::call('create_product_type',[$type->getProductTypesName()])->execute();
	}

	public function update_product_typeDB(ProductTypes $type){

		return DB::call('update_product_type',[
			$type->getIdproductTypes(),
			$type->getProductTypesName()])->execute();
	}

	public function read_product_typeDB(){

		return DB::table('read_document_types')->select()->getAll();
	}
}