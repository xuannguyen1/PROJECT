<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
class PanigationModel extends Model
{
    protected $table='tblproduct';
    protected $fillable = [
        'id_product','id_category','productName','price','description','image', 'image_url', 'quantity','trademark','size','color','date'
    ];
    public function panigated($id)
    {
    	$pro = DB::table('tblproduct')->where('id_category', $id)->paginate(3);
    	return $pro;
    } 
}
