<?php

namespace App\Models\Products;

use Database\Class\DocumentTypes;
use Database\Class\ProductTypes;
use LionSql\Drivers\MySQLDriver as DB;

class ProductTypesModel {

	public function __construct() {
		
	}

    public function createProductTypesDB(ProductTypes $type) {
        return DB::call('create_product_type', [
            $type->getProductTypesName()
        ])->execute();
    }

    public function updateProductTypesDB(ProductTypes $type) {
        return DB::call('update_product_type', [
            $type->getIdproductTypes(),
            $type->getProductTypesName()
        ])->execute();
    }

    public function readProductTypesDB() {
        return DB::fetchClass(DocumentTypes::class)
            ->table('read_document_types')
            ->select()
            ->getAll();
    }

}