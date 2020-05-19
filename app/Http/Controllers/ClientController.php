<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClientController extends Controller
{
    public function index(){
        return view('client.home');
    }
    public function shop(){
        $tbl_products= DB::table('tbl_products')->get()
            ->where('product_status', 1)
            ->take(12);
       return view('client.shop')
                        ->with('tbl_products',$tbl_products);
//        return view('layoute.app')
//            ->with('client.shop', $manage_product);
    }
    public function cart(){
        return view('client.cart');
    }
    public function checkout(){
        return view('client.checkout');
    }
}
