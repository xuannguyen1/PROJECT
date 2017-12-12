<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use DB;

class SearchGDController extends Controller
{
    public function Search(Request $request)
    {
        $key = $request->input('key');
        $Rule = "/^[a-zA-Z0-9]{1,50}$/";
        if (preg_match($Rule,$key) && strlen($key)>1)
        {
            $search  = new ProductModel();        
            return view('searchGD',['result'=> $search->Search($key)]);
        }
       
        else
        {
            $newpro  = new ProductModel();        
            return view ('searchGD',['newpro'=>$newpro->NewProduct(),'err'=>'Từ khóa không hợp lệ. Vui lòng nhập lại từ khóa!']);
        }
    }   
  
}