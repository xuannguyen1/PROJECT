<?php

namespace App\Http\Controllers;
use App\Models\OrderModel;
use App\Models\ProductModel;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
class CartController extends Controller
{
    //
    function addToCart(Request $request)
    {
        //BEGIN ADD TO CART
        if(Session::has('product'))
        {
             
            $array_id = array_column( Session::get('product'),"id");
            if(in_array($request->input('id'),$array_id))
            {
                echo "<script>alert('Product Already Exists');</script>";
            }
            else
            {
                Session::push('product',$request->only('id','name','size','color','quantity','image','price'));
            }
        }
        else
        {
          Session::push('product',$request->only('id','name','size','color','quantity','image','price'));
        }
       $Product = new ProductModel();
          return view('home', ['women' => $Product->WoMen(),'men' => $Product->Man(),'kid' =>$Product->Kid()]);
     }

     function cartDetail()
     {
         $cart['cart'] = Session::get('product');
         return view('cart',$cart);
         
     }

     function deleteCart()
     {
         Session::flush();
     }

     function checkout(Request $request)
     { 
        $bill = $request->input('bill');

        $subtotal = $request->input('subTotal');

        $order = new OrderModel();

        $check = $order->addBill($request);

        $subtotal=str_replace(",","",$subtotal);
        if($check)
        return redirect::to(NGAN_LUONG.$bill."&price=".$subtotal.RETURN_URL);
        else
        return redirect('Login');
    }
}
