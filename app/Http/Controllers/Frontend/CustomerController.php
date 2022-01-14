<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class CustomerController extends Controller
{
    public function index(){
        $no = 0;
        $map_users = User::get();
        foreach($map_users as $map_user => $key){
            $key->jumlah_order = Order::where('customer_id', $key->id)->count();
        }
        $users = $map_users->sortByDesc('jumlah_order');
        return view('frontend.customer.index', compact('users', 'no'));
    }
}
