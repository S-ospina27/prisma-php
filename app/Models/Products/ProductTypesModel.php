<?php

namespace App\Models\Products;

use Database\Class\ProductTypes;
use LionSQL\Drivers\MySQL as DB;

class ProductTypesModel {

	public function __construct() {
		
	}

    public function createProductTypesDB(ProductTypes $productTypes) {
        return DB::call('create_product_type', [
            $productTypes->getProductTypesName()
        ])->execute();
    }

    public function updateProductTypesDB(ProductTypes $productTypes) {
        return DB::call('update_product_type', [
            $productTypes->getIdproductTypes(),
            $productTypes->getProductTypesName()
        ])->execute();
    }

    public function readProductTypesDB() {
        return DB::fetchClass(ProductTypes::class)
            ->table('product_types')
            ->select()
            ->getAll();
    }

}