<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Helper\RedirectHelper;
use App\Models\Categories;
use App\Models\Order;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
// use Stripe\Charge;
use Stripe;

class StripePaymentController extends Controller
{
    public function paymentCheckout()
    {
        $auth = Auth::user();
// return $datas;
        $cartItems = \Cart::content();
        $data['category'] = Categories::where('status', '=', Categories::$statusArrays[0])->get();
        $data['subcategory'] = SubCategory::where('status', '=', SubCategory::$statusArrays[0])->get();
        return view('site.stripeCheckout', $data,  compact('cartItems', 'auth'));
    }

    //_orderplace_____
    public function OrderPlace(Request $request)
    {
        if ($request->payment_type=="Hand cash") {

            $order = array();
            $order['user_id'] = Auth::id();
            $order['name'] = $request->name;
            $order['phone'] = $request->phone;
            $order['shipping_address'] = $request->shipping_address;
            $order['email'] = $request->email;
            $order['post_code'] = $request->post_code;
            $order['city'] = $request->city;
            $order['subtotal'] = \Cart::subtotal();
            $order['total'] = \Cart::total();
            $order['payment_type'] = $request->payment_type;
    
            // dd($order);
            $order_id = DB::table('orders')->insertGetId($order);
            // return $order_id;
            $content = \Cart::content();
            $details = array();
            foreach ($content as $row) {
                $details['order_id'] = $order_id;
                $details['animal_id'] = $row->id;
                $details['animal_name'] = $row->name;
                $details['quantity'] = $row->qty;
                $details['single_price'] = $row->price;
                $details['subtotal_price'] = $row->price * $row->qty;
                DB::table('order_details')->insert($details);
                
            }
            // return $details;
            \Cart::destroy();

            $notification = array(
                'message' => 'Successfully Order Placed!',
                'alert-type' => 'success'
            );
        
            return redirect()->route('home')->with($notification);

            // $message = array('messege' => 'Successfullt Order Placed!', 'alert-type' => 'success');
            // return redirect()->route('home')->with($message);


            






        }elseif($request->payment_type=="Aamarpay"){
            // echo "amarpay";
            // return $request;

            $tran_id = "test".rand(1111111,9999999);//unique transection id for every transection 

        $currency= "BDT"; //aamarPay support Two type of currency USD & BDT  
        $delevary_charge = '50';
        $amount = \Cart::subtotal()+$delevary_charge ;
        
        $store_id = "aamarpaytest";
        $user_id = Auth::id();
        // dd($user_id);

        $signature_key = "dbb74894e82415a2f7ff0ec3a97e4183"; 

        $url = "https://​sandbox​.aamarpay.com/jsonpost.php"; // for Live Transection use "https://secure.aamarpay.com/jsonpost.php"

        $curl = curl_init();
        $aamarpay = DB::table('payment_getway_bd')->first();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "store_id": "'.$store_id.'",
            "tran_id": "'.$tran_id.'",
            "success_url": "'.route('success').'",
            "fail_url": "'.route('fail').'",
            "cancel_url": "'.route('cancel').'",
            "amount": "'.$amount.'",
            "currency": "'.$currency.'",
            "signature_key": "'.$signature_key.'",
            "desc": "Merchant Registration Payment",
            "cus_name": "'.$request->name.'",
            "cus_email": "'.$request->email.'",
            "cus_add1": "'.$request->shipping_address.'",
            "cus_add2": "'.$user_id.'",
            "cus_city": "'.$request->city.'",
            "cus_state": "Dhaka",
            "cus_postcode": "'.$request->post_code.'",
            "cus_country": "Bangladesh",
            "cus_phone": "'.$request->phone.'",
            "opt_a": "'.$request->user_id.'",
            "opt_b": "'.Auth::id().'",
            "opt_c": "'.$request->city.'",
            "opt_d": "'.$request->post_code.'",
            "type": "json"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
       

        $response = curl_exec($curl);

        curl_close($curl);
        // dd($response);
        
        $responseObj = json_decode($response);

        if(isset($responseObj->payment_url) && !empty($responseObj->payment_url)) {

            $paymentUrl = $responseObj->payment_url;
            // dd($paymentUrl);
            return redirect()->away($paymentUrl);

        }else{
            echo $response;
        }












        }




       
    }













    public function success(Request $request){
        // return $request->all;
        

        $order = array();
            $order['user_id'] = $request->opt_b;
            $order['name'] = $request->cus_name;
            $order['phone'] = $request->cus_phone;
            $order['shipping_address'] = $request->cus_add1;
            $order['email'] = $request->cus_email;
            $order['post_code'] = $request->opt_d;
            $order['city'] = $request->opt_c;
            $order['subtotal'] = $request->amount;
            $order['total'] = \Cart::total();
            $order['payment_type'] = 'amarpay';

    
            $order_id = DB::table('orders')->insertGetId($order);
            // return $order;
            $content = \Cart::content();
            $details = array();
            foreach ($content as $row) {
                $details['order_id'] = $order_id;
                $details['animal_id'] = $row->id;
                $details['animal_name'] = $row->name;
                $details['quantity'] = $row->qty;
                $details['single_price'] = $row->price;
                $details['subtotal_price'] = $row->price * $row->qty;
                // return $details;
                DB::table('order_details')->insert($details);
                // return $details;
                
            }
            // return $details;
            \Cart::destroy();
    
            
            $notification = array(
                'message' => 'Successfully Order Placed!',
                'alert-type' => 'success'
            );
        
            return redirect()->route('home')->with($notification);

        $request_id= $request->mer_txnid;

        //verify the transection using Search Transection API 

        $url = "http://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$request_id&store_id=aamarpaytest&signature_key=dbb74894e82415a2f7ff0ec3a97e4183&type=json";
        
        //For Live Transection Use "http://secure.aamarpay.com/api/v1/trxcheck/request.php"
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }


    public function fail(Request $request){
        
    }

    public function cancel(){
        return 'Canceled';
    }



}
