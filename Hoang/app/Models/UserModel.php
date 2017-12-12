<?php

namespace App\Models;
use Illuminate\Support\MessageBag;
use Validator;
use DB;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;

class UserModel extends Authenticatable
{
    //
    use Notifiable;
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $table='tblusers';
        protected $fillable = [
            'userName','passWord','email','address', 'email', 'address','role','Fullname',
        ];
    
        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

        public function Login($email,$password)
        {
          $user= UserModel::select('*')->where('email','=',$email)->where('passWord','=',$password)->get()->toArray();

          return $user;     
        }
        public function changePass($email)
        {
          $user = DB::table('tblusers')->select('*')->where('email', '=', $email)->get()->toArray();
          return $user;

        }
        
        
        
}
