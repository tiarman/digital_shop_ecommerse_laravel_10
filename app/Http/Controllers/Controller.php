<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct() {
        // get specific user
    
        $data['logo'] = null;
        $data['contact_no_1'] = null;
        $data['contact_no_2'] = null;
        $data['email'] = null;
        $data['facebook'] = null;
        $data['twitter'] = null;
        $data['linkedin'] = null;
        $data['instagram'] = null;
        $data['office_address'] = null;
        $data['about_us'] = null;
        $data['about_practice'] = null;
    
          $data['logo'] = Setting::where('key', Setting::$keyArray[0])->first();
          $data['contact_no_1'] = Setting::where('key', Setting::$keyArray[1])->first();
          $data['contact_no_2'] = Setting::where('key', Setting::$keyArray[2])->first();
          $data['email'] = Setting::where('key', Setting::$keyArray[3])->first();
          $data['facebook'] = Setting::where('key', Setting::$keyArray[4])->first();
          $data['twitter'] = Setting::where('key', Setting::$keyArray[5])->first();
          $data['linkedin'] = Setting::where('key', Setting::$keyArray[6])->first();
          $data['instagram'] = Setting::where('key', Setting::$keyArray[7])->first();
          $data['office_address'] = Setting::where('key', Setting::$keyArray[8])->first();
          $data['about_us'] = Setting::where('key', Setting::$keyArray[9])->first();
          // $data['about_practice'] = Setting::where('key', Setting::$keyArray[10])->first();
        
        // dd( $data);
        View::share('logo', $data['logo']);
        View::share('contact_no_1', $data['contact_no_1']);
        View::share('contact_no_2', $data['contact_no_2']);
        View::share('email', $data['email']);
        View::share('facebook', $data['facebook']);
        View::share('twitter', $data['twitter']);
        View::share('linkedin', $data['linkedin']);
        View::share('instagram', $data['instagram']);
        View::share('office_address', $data['office_address']);
        View::share('about_us', $data['about_us']);
        // View::share('about_practice', $data['about_practice']);
      }
}
