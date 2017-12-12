<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\UserModel;
use App\Models\ProductModel;
use Validator;
use DB;

class ChangepassController extends Controller
{
  public function getChangepass() 
  {
    return view('changepass');
  }
  function postChangePass(Request $request)
  {
    $rules =    
    [
      'email' =>'required|email',
      'password' => 'required|min:6',
      'password1' => 'required|min:6'
    ];
    $messages = 
    [
      'email.email' => 'Email không đúng định dạng',
      'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
      'password1.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) 
    {
     return redirect()->back()->withErrors($validator)->withInput();
    } 
    else
    {
      $Rule = "/^[A-Z]{1}[a-zA-Z0-9]{5,12}$/";
      $email = $request->input('email');
      $password = $request->input('password');
      $password1 = $request->input('password1');
      $status = false;
 
      if (preg_match($Rule,$password) && preg_match($Rule,$password1))
      {
        if($password===$password1)
        {
          $check=true;
          $test= new UserModel();
          $user = $test->changePass($email);
          foreach($user as $val)
          {   
            $mail=$val->email;
            $pass=$val->passWord;
            
            if($email===$mail)
            { 
              $check=false;
              DB::update('update tblusers set passWord = ? where email = ?',[$password,$email]);
              // echo "Updated pass successfully.<br/>";
              return redirect('Login');
            }
            
          }
          if($check==true)
          {
            $errors = new MessageBag(['errormail' => 'Email không tồn tại']);
            return redirect()->back()->withInput()->withErrors($errors);
          }
          $status =true;
          
        }
        if($status==false)
        {
          $errors = new MessageBag(['errorchange' => 'Password không trùng khớp']);
          return redirect()->back()->withInput()->withErrors($errors);
        }
      }
      else
      {
        $errors = new MessageBag(['errorpass' => 'Ký tự đầu viết hoa và có ít nhất 6 ký tự']);
        return redirect()->back()->withInput()->withErrors($errors);
      }

    }      
  }
}
