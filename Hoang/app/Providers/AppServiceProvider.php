<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer('layouts.master', function($view)
        {
   
            $category['category'] =DB::table('tblcategory')->where('parent','=', 0)->get()->toArray();
            $category['parent'] =DB::table('tblcategory')->where('parent','>', 0)->get()->toArray();
          
            $view->with('menu',$category);
        });
       

    }
    

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
