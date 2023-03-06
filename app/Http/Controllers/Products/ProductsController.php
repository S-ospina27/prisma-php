<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\ProductsModel;
use Database\Class\Products;
use LionFiles\Store;
use LionHelpers\Arr;
use LionHelpers\Str;
use LionSecurity\JWT;

class ProductsController {

	private ProductsModel $productsModel;
	private Products $products;

	public function __construct() {
		$this->productsModel = new ProductsModel();
	}

    private function uploadImage() {
        $folder = "assets/img/products/";
        Store::folder($folder);

        Store::upload(
            request->products_image['tmp_name'],
            $this->products->getProductsImage(),
            $folder
        );
    }

    public function createProducts() {
        $jwt = JWT::decode(JWT::get());

        $this->products = Products::formFields()
            ->setProductsImage(Store::rename(request->products_image['name'], "IMG"))
            ->setIdstatus(1)
            ->setIdusers((int) $jwt->data->idusers);
        $this->uploadImage();

        $responseCreate = $this->productsModel->createProductsDB($this->products);
        if ($responseCreate->status === 'database-error') {
            return response->error("A ocurrido un error al registrar el producto");
        }

        return response->success("Producto registrado correctamente");
    }

    public function updateProducts() {
        $this->products = Products::formFields();

        if (is_array(request->products_image)) {
            $this->products->setProductsImage(Store::rename(request->products_image['name'], "IMG"));
            $this->uploadImage();
        } else {
            $this->products->setProductsImage(Str::of(request->products_image)->toNull());
        }

        $responseUpdate = $this->productsModel->updateProductsDB($this->products);
        if ($responseUpdate->status === 'database-error') {
            return response->error("A ocurrido un error al actualizar el producto");
        }

        return response->success("Producto actualizado correctamente");
    }

    public function readProducts() {
        return $this->productsModel->readProductsDB();
    }

    public function readFilterProducts() {
        return Arr::of($this->readProducts())->tree('status_type');
    }

}