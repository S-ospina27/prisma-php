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
            ->setProductsImage(Manage::rename(request->products_image['name'], "IMG"));

        Manage::upload(
            request->products_image['tmp_name'],
            $this->products->getProductsImage(),
            path("public/File/")
        );

        $this->products->setIdstatus(1);
        $createProducts= $this->productsModel->createProductsDB($this->products);
        if ($createProducts->status === 'database-error') {
            return response->error("A ocurrido un error al registrar el producto");
        }

        return response->success("Producto registrado correctamente");
    }

    public function updateProducts() {
        $this->products =  Products::formFields();

        if(is_array(request->products_image)) {
            $this->products->setProductsImage(
                Manage::rename(request->products_image['name'], "IMG")
            );

            Manage::upload(
                request->products_image['tmp_name'],
                $this->products->getProductsImage(),
                path("public/File/")
            );
        }

        $updateProducts = $this->productsModel->updateProductsDB($this->products);
        if ($updateProducts->status === 'database-error') {
            return	response->error("A ocurrido un error al actualizar el producto");
        }

        return response->success("Producto actualizado correctamente");
    }

    public function readProducts() {
        return $this->productsModel->readProductsDB();
    }

}