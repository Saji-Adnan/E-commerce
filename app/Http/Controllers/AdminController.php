<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashbored(){
        return view('admin.dashbored');
    }
    public function add_category(){
        return view('admin.add_category');
    }
   public function add_product(){
        return view('admin.add_product');
    }
    public function add_slider(){
        return view('admin.add_slider');
    }
    public function all_categories(){
        return view('admin.all_categories');
        }
    public function all_products(){
        return view('admin.all_products');
        }
   public function all_sliders(){
        return view('admin.all_sliders');
        }

}
