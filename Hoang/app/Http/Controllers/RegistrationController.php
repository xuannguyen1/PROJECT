<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\UserModel;
//use App\Http\Requests;
//use App\Http\Controllers\Controller;

class RegistrationController extends Controller 
{
   public function getRegister()
   {
      return view('register');
   }
   
   public function postRegister(Request $request)
   {
      
     
         $use = new UserModel();
         
         if((((!empty($request->input('username'))&& !empty($request->fullname))&& !empty($request->address))&& !empty($request->email))&& !empty($request->password))
         {
            $username = $request->input('username');
            $fullname = $request->fullname;
            $address = $request->address;
            $email = $request->email;
            $password = $request->password;
            ////
            if (preg_match("/^[a-zA-Z ]*$/",$username))
            {
               $use->userName = $username;
            }else{
            //    echo "<script>alert('Name only has characters')</script>";
               return view ('register',['err'=>'Tên chỉ chứa các ký tự']);
            }
           
               $arr=DB::table('tblusers')->select('email')->get();

               foreach ($arr as $key => $value)
               {
                  $value = (array) $value;
                 
                  if(count($arr)>0 && $value['email'] == $email)
                  {
                  //    echo "<script>alert('Email is same')</script>";
                     return view ('register',['err'=>'Email đã tồn tại']);
                  }else{
                     $use->email = $email;
                  }
               }
        
               
            if(preg_match("/^[A-Z]{1}[a-zA-Z0-9]{5,12}$/",$password))
            {
               $use->passWord = $password;
            }
            else
            {
            //    echo "<script>alert('The first character must be capitalized and is more than 6 characters')</script>";
               return view ('register',['err'=>'Ký tự đầu viết hoa và có ít nhất 6 ký tự']);
            } 

            $use->address = $address;
            $use->role     = 0;
            $use->Fullname = $fullname;
            $use->save();
            return view ('login');
         }
         else
         {
            return view ('register');
         }

   }
}