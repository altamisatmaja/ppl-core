<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class LacakCustomerController extends Controller
{
    public function index(){
        $user = auth()->user();

        $orders = Order::where('id_user', $user->id)->get();
        $allorders = [];

        foreach ($orders as $order) {
            $orderDetails = OrderDetail::where('id_order', $order->id)->get();
            $allorders[] = [
                'order' => $order,
                'order_details' => $orderDetails,
            ];
        }
        return view('customer.pages.lacak.index');
    }
  
    public function lacak_new(){
        $user = auth()->user();

        $orders = Order::where('id_user', $user->id)->where('status','Baru')->get();
        $allorders = [];

        foreach ($orders as $order) {
            $orderDetails = OrderDetail::where('id_order', $order->id)->get();
            $allorders[] = [
                'order' => $order,
                'order_details' => $orderDetails,
            ];
        }

        return view('customer.pages.lacak.new', compact('allorders'));
    }

    public function lacak_confirmed(){
        $user = auth()->user();

        $orders = Order::where('id_user', $user->id)->where('status','Dikonfirmasi')->get();
        $allorders = [];

        foreach ($orders as $order) {
            $orderDetails = OrderDetail::where('id_order', $order->id)->get();
            $allorders[] = [
                'order' => $order,
                'order_details' => $orderDetails,
            ];
        }
        return view('customer.pages.lacak.confirmed', compact('allorders'));
    }

    public function lacak_packed(){
        $user = auth()->user();

        $orders = Order::where('id_user', $user->id)->where('status','Dikemas')->get();
        $allorders = [];

        foreach ($orders as $order) {
            $orderDetails = OrderDetail::where('id_order', $order->id)->get();
            $allorders[] = [
                'order' => $order,
                'order_details' => $orderDetails,
            ];
        }
        return view('customer.pages.lacak.packed', compact('allorders'));
    }

    public function lacak_sent(){
        $user = auth()->user();

        $orders = Order::where('id_user', $user->id)->where('status','Dikirim')->get();
        $allorders = [];

        foreach ($orders as $order) {
            $orderDetails = OrderDetail::where('id_order', $order->id)->get();
            $allorders[] = [
                'order' => $order,
                'order_details' => $orderDetails,
            ];
        }
        return view('customer.pages.lacak.sent', compact('allorders'));
    }

    public function lacak_end(){
        $user = auth()->user();

        $orders = Order::where('id_user', $user->id)->where('status','Selesai')->get();
        $allorders = [];

        foreach ($orders as $order) {
            $orderDetails = OrderDetail::where('id_order', $order->id)->get();
            $allorders[] = [
                'order' => $order,
                'order_details' => $orderDetails,
            ];
        }
        return view('customer.pages.lacak.end');
    }

    public function handle_status(Request $request, $id)
    {
        $message = $request->message;
        $order = Order::where('id', $id)->first();
        $order->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', $message);
    }

}
