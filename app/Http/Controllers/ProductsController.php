<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Database\Class\Products;
use Database\Class\ProductTypes;
use LionFiles\Manage;

class ProductsController {

	private ProductsModel $productModel;
	private Products $products;

	public function __construct() {
		$this->productModel= new productsModel();
	}

	public function createProducts(){
		$this->products =  Products::formFields()
			->setProductsImage(Manage::rename(request->products_image['name'],"IMG"));

		Manage::upload(
			request->products_image['tmp_name'],
			$this->products->getProductsImage(),
			path("public/File/")
		);

		$this->products->setIdstatus(1);
		$createProducts= $this->productModel->createProductsDB($this->products);

		if ($createProducts->status === 'database-error') {
			return response->error("a ocurrido un error al crear el producto");
		}

		return response->success("producto creado correctamente");
	}

	public function updateProducts() {
		$this->products =  Products::formFields();

		if(is_array(request->products_image)){
			$this->products->setProductsImage(
				Manage::rename(request->products_image['name'],"IMG")
			);

			Manage::upload(
				request->products_image['tmp_name'],
				$this->products->getProductsImage(),
				path("public/File/")
			);
		}

		$updateProducts= $this->productModel->updateProductsDB($this->products);

		if ($updateProducts->status==='database-error') {
			return	response->error("a ocurrido un error al actualizar el producto");
		}

		return response->success("producto actualizado correctamente");
	}

	public function readProducts(){

		return $this->productModel->readProductsDB();
	}

	public function create_product_type(){
		$create_typeproducts= $this->productModel->create_product_typeDB(ProductTypes::formFields());

		if ($create_typeproducts->status==='database-error') {
			return response->error("a ocurrido un error al crear el tipo de producto");
		}

		return response->success(" tipo de producto creado correctamente");
	}

	public function update_product_type(){
		$update_typeproducts= $this->productModel->update_product_typeDB(ProductTypes::formFields());

		if ($update_typeproducts->status==='database-error') {
			return 	response->error("a ocurrido un error al actualizar el tipo de producto");
		}

		return response->success(" tipo de producto actualizado correctamente");
	}

	public function read_product_type(){
		return $this->productModel->read_product_typeDB();
	}

}