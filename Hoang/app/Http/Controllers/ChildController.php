<?php

namespace App\Http\Controllers;
use DB;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\PanigationModel;
use Illuminate\Pagination;
class ChildController extends Controller
{
    public function show($id)
    {      
        $pro = new ProductModel();
        $products=new PanigationModel();   
    	return view('child',['products'=>$products->panigated($id),'cate'=>$pro->getCategory()]);
    }
} 
