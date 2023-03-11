<?php

namespace App\Http\Controllers\APIS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// laravel Classes
use DB;
// Model 
use App\category;
use Auth;
use App\Role;
use App\User;

use App\Contactus;


use App\Aboutus;
use App\Shop;
use App\Banner;

use Session;
use Validator;
use Mail;
use Redirect;


class HomeController extends Controller
{
   
    // ---------------Adv
    public function Advlist()
    {
        $output = array();
        // get all category
        $banners = DB::table('banners')->get();
       
        if ($banners) {
            $output['message'] = true;
            $output['code'] = 100;
            $output['data'] = $banners;
        } else {
            $output['message'] = true;
            $output['code'] = 100;
            $output['data'] = "لا توجد أعلانات";
        }
        return response()->json($output);
    }
    // ---------------Adv

  

    
    
  

}
