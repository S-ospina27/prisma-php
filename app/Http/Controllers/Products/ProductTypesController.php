<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\ProductTypesModel;
use Database\Class\ProductTypes;

class ProductTypesController {

    private ProductTypesModel $productTypesModel;

	public function __construct() {
        $this->productTypesModel = new ProductTypesModel();
	}

    public function createProductType() {
        $create_typeproducts = $this->productTypesModel->createProductTypesDB(ProductTypes::formFields());

        if ($create_typeproducts->status === 'database-error') {
            return response->error("a ocurrido un error al crear el tipo de producto");
        }

        return response->success("Tipo de producto registrado correctamente");
    }

    public function readProductType() {
        return $this->productTypesModel->readProductTypesDB();
    }

    public function updateProductType() {
        $update_typeproducts = $this->productTypesModel->updateProductTypesDB(ProductTypes::formFields());

        if ($update_typeproducts->status === 'database-error') {
            return response->error("A ocurrido un error al actualizar el tipo de producto");
        }

        return response->success("Tipo de producto actualizado correctamente");
    }

}