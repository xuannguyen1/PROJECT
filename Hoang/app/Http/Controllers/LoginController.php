<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;
use Validator;
use Auth;
use Session;

class LoginController extends Controller
{
    
    public function getLogin() 
    {
      return view('Login');
    }
    public function postLogin(Request $request) 
    {
      $rules =    [
        'email' =>'required|email',
        'password' => 'required|min:6'
      ];
      $messages = [
                  'email.required' => 'Email là trường bắt buộc',
                  'email.email' => 'Email không đúng định dạng',
                  'password.required' => 'Mật khẩu là trường bắt buộc',
                  'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
                ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if ($validator->fails()) 
      {
           return redirect()->back()->withErrors($validator)->withInput();
      } 

      else 
      {
          $email = $request->input('email');
          $password = $request->input('password');
          $check= new UserModel();
          $user=$check->Login($email,$password);
          if(count($user)>0) 
          {
            Session::put('email',$email);
            Session::put('Fullname',$user[0]['Fullname']);
            Session::put('id_user',$user[0]['id_user']);

            // Tạo session tên user_email với giá trị là $email
            $user_email = Session::get('email');  
            $user_Fullname = Session::get('Fullname');  
            $user_id_user = Session::get('id_user');  

            return redirect('Home');
          } 

          else 
          {
            $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
            return redirect()->back()->withInput()->withErrors($errors);
          }
      }
      
    }
    public function getLogout() 
    {
      // Auth::logout();
      Session::forget('Fullname');
      Session::forget('id_user');
      return redirect('Home');
    }
}