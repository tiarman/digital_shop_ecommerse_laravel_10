<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->roles->pluck('name');
        if ($role[0] == 'Super Admin') {
            $datas['orders']    = Order::with('user')->get();
            // return $datas;
            $datas['role']      = $role;
            $total_order = DB::table('orders')->count();
            // return $total_order;
            $complete_order = DB::table('orders')->where('status', 'complete')->count();
            $pending = DB::table('orders')->where('status', 'pending')->count();
            $cancel_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 5)->count();
            $return_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 4)->count();
            // return $role[0];
            return view('admin.order.index', $datas, compact('total_order', 'complete_order', 'pending', 'cancel_order', 'return_order'));
        } else {
            $datas['orders']    = Order::where('user_id', auth()->id())->with('user')->get();
            $datas['role']      = $role[0];

            $total_order = DB::table('orders')->where('user_id', Auth::id())->count();
            $complete_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 'complete')->count();
            $pending = DB::table('orders')->where('user_id', Auth::id())->where('status', 'PENDING')->count();
            $cancel_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 5)->count();
            $return_order = DB::table('orders')->where('user_id', Auth::id())->where('status', 4)->count();

            return view('admin.order.index', $datas, compact('total_order', 'complete_order', 'pending', 'cancel_order', 'return_order'));
        }
    }

    public function ajaxUpdateStatus(Request $request)
    {
        $order = Order::find($request->id);

        if ($order->update(['status' => $request->status])) {
            return 'success';
        }
    }


    //_view Order
    public function ViewOrder($id)
    {
        // $order = DB::table('orders')->where('id', $id)->first();
        // $order_details = DB::table('order_details')->where('order_id', $id)->get();
        $data['orders'] = OrderDetails::with('order')->where('order_id', $id)->get();
        // return $data;
        return view('admin.order.order_details', $data);
    }
}
