<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\ProductsModel;
use Database\Class\Products;
use LionFiles\Manage;

class ProductsController {

	private ProductsModel $productsModel;
	private Products $products;

	public function __construct() {
		$this->productsModel = new ProductsModel();
	}

	public function createProducts() {
        $this->products = Products::formFields()
        ->setProductsImage(Manage::rename(request->products_image['name'], "IMG"))
        ->setIdstatus(1)
        ->setIdusers(3);

        $folder = "assets/img/products/";
        Manage::folder($folder);

        Manage::upload(
            request->products_image['tmp_name'],
            $this->products->getProductsImage(),
            path("public/{$folder}")
        );

        $responseCreate = $this->productsModel->createProductsDB($this->products);
        if ($responseCreate->status === 'database-error') {
            return response->error("A ocurrido un error al registrar el producto");
        }

        return response->success("Producto registrado correctamente");
    }

public function updateProducts() {
        $this->products = Products::formFields()
        ->setProductsImage(Manage::rename(request->products_image['name'], "IMG"));

        $folder = "assets/img/products/";
        Manage::folder($folder);

        Manage::upload(
            request->products_image['tmp_name'],
            $this->products->getProductsImage(),
            path("public/{$folder}")
        );

        $responseUpdate = $this->productsModel->updateProductsDB($this->products);
        if ($responseUpdate->status === 'database-error') {
            return response->error("A ocurrido un error al actualizar el producto");
        }

        return response->success("Producto aztualizado correctamente");
    }



public function readProducts() {
    return $this->productsModel->readProductsDB();
}

}