<?php

namespace App\Models;
use Session;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    //
    //
    protected $table='tblorder';
    protected $fillable = [
        'id_order','bill_code', 'id_user','date_order','total_money','content'
    ];

    public function addBill($request)
    {
        if(Session::has('id_user')){
        $arrProduct = array();
                
        $product['Name'] = $request->input('product_name');
                
        $product['quantity'] = $request->input('quantity');
                
        $product['price'] = $request->input('price');
                
        $product['total'] = $request->input('total');
                
        for($i=0;$i<count($product['Name']);$i++)
        {
                    
            $ProductObj = (object)['Name'=>$product['Name'][$i],'Quantity'=>$product['quantity'][$i],
                        
            'Price'=>$product['price'][$i],'Total'=>$product['total'][$i]];
                        
            array_push($arrProduct,$ProductObj);
                
        }
                
        $this->bill_code = $request->input('bill');
        $this->id_user =Session::get('id_user');
                
        $this->total_money = $request->input('subTotal');
                
        $this->content = json_encode($arrProduct);
                
        $this->save();
        return true;
    }else{
        return false;
    }

            
    }
}
