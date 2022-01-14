<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders_count = Order::when(request()->invoice_id, function($orders){
            $orders = $orders->where('invoice_id', 'like', '%'.request()->invoice_id.'%');
        })->when(request()->status, function($orders){
            $orders = $orders->where('status', 'like', '%'.request()->status.'%');
        })->when(request()->delivery_date_since, function($orders){
            $orders = $orders->where('delivery_date', '>=', date('Y-m-d 00:00:00', strtotime(request()->delivery_date_since)));
        })->when(request()->delivery_date_until, function($orders){
            $orders = $orders->where('delivery_date', '<=', date('Y-m-d 23:59:59', strtotime(request()->delivery_date_until)));
        })->count();
        $orders = Order::when(request()->invoice_id, function($orders){
            $orders = $orders->where('invoice_id', 'like', '%'.request()->invoice_id.'%');
        })->when(request()->status, function($orders){
            $orders = $orders->where('status', 'like', '%'.request()->status.'%');
        })->when(request()->delivery_date_since, function($orders){
            $orders = $orders->where('delivery_date', '>=', date('Y-m-d 00:00:00', strtotime(request()->delivery_date_since)));
        })->when(request()->delivery_date_until, function($orders){
            $orders = $orders->where('delivery_date', '<=', date('Y-m-d 23:59:59', strtotime(request()->delivery_date_until)));
        })->paginate(10);
        return view('frontend.order.index', compact('orders', 'orders_count'));
    }

    public function detail($id){
        $order = Order::findOrFail($id);
        return view('frontend.order.detail', compact('order'));
    }
}
