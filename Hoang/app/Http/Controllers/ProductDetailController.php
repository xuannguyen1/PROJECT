<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ProductModel;
class ProductDetailController extends Controller
{
    public function postProductDetail(Request $request)
	{
		$id=$request->xuan;
		$product = new ProductModel();
		return view('ProductDetail',['product' => $product->getOneProduct($id)]);
	}
}
