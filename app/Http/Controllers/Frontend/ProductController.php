<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\DetailOrder;

class ProductController extends Controller
{
    public function index(){
        $no = 0;
        $map_products = Product::get();
        foreach($map_products as $map_product => $key){
            $key->jumlah_order = DetailOrder::where('product_id', $key->id)->count();
        }
        $products = $map_products->sortByDesc('jumlah_order');
        return view('frontend.product.index', compact('products', 'no'));
    }
}
