<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table='tblproduct';
    protected $fillable = [
        'id_product','id_category','productName','price','description','image', 'image_url', 'quantity','trademark','size','color','date'
    ];

    /**
    * List products of women.
    */
    public function WoMen() {   
        //Women
        $tProW = DB::table('tblproduct')->where('id_category', 6)->orwhere('id_category',7)->inRandomOrder()->limit(4)->get()->toArray();
        $tReW['women'] = array();

        foreach($tProW as $key => $value)
        {
            $W = (array)$value;
            array_push($tReW['women'],$W);
        }
        return  $tReW['women'];
    }

    public function Man()
    {
        //Men
        $tProM = DB::table('tblproduct')->where('id_category', 8)->inRandomOrder()->limit(4)->get()->toArray();
        $tReM['men'] = array();
        
        foreach($tProM as $key => $value)
        {
            $M = (array)$value;
            array_push($tReM['men'],$M);
        }
        return $tReM['men'];
    }
    public function Kid()
    {
        //Kid
        $tProK = DB::table('tblproduct')->where('id_category', 9)->orwhere('id_category',10)->inRandomOrder()->limit(4)->get()->toArray();
        $tReK['kid'] = array();

        foreach($tProK as $key => $value)
        {
            $K = (array)$value;
            array_push($tReK['kid'],$K);
        }
        
        return $tReK['kid'];

    }
    public function getProduct($id)
    {
         $pro = DB::table('tblproduct')->where('id_category', $id)->get()->toArray();
         return $pro;
    }
    public function getCategory()
    {
         $cate = DB::table('tblcategory')->select('*')->get()->toArray();
         return $cate;
    }
    public function getOneProduct($id)
    {
        $arr['product'] = DB::table('tblproduct')->where('id_product', $id)->get();
        $arr['related'] =DB::table('tblproduct')->where('id_category',$arr['product'][0]->id_category)->limit(4)->get();
            
        return $arr;
    }  
        
    public function Search($key)
    {
        
            $result['search'] = DB::table('tblproduct')->select('*')->where('productName', 'like', '%' . $key . '%')
            ->orWhere('description', 'like', '%' . $key . '%')->orWhere('trademark', 'like', '%' . $key . '%')->get()->toArray();
           foreach($result['search'] as $val)
           {    
                $category=$val->id_category;
                $result['related']= DB::table('tblproduct')->select('*')->where('id_category','=',$category)->limit(4)->get()->toArray();
           }
           
           $temp= $result['related'];
           for($i =0;$i<count($result['search']);$i++)
           {
               for($j =0;$j<count($result['related']);$j++)
               {
                    if($result['related'][$j]->id_product ==$result['search'][$i]->id_product)
                    {
                         unset($temp[$j]);
                    }
               }
               
              
           }
      
           $result['related']=$temp;
           return $result;
        
    }

    public function NewProduct()
    {
        $newPro = DB::table('tblproduct')->select('*')->orderBy('date','ASC')->limit(8)->get()->toArray(); 
    //    var_dump($newPro);die(); 
        return $newPro;
        
    
    }
}
