<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use DB;

class IndexController extends Controller
{   
    public function index()
    {   
        $product = new ProductModel();
        return view('home', ['women' => $product->WoMen(),'men' => $product->Man(),'kid' =>$product->Kid()]);

    }
    
}
