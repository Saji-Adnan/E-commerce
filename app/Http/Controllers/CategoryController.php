<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function save_category(Request $request){
        $data = [];
        $data['category_name']= $request->category_name;

        \DB::table('tbl_category')->insert($data);
         Session::put('message', 'The Category Added Succesfuly');

        return redirect('add_category');
    }
    public function delete_category($id){
        DB::table('tbl_category')->where('id',$id)
                                        ->delete();
        Session::put('message1', 'The Category Deleted Succesfuly');

        return redirect('all_categories');
    }
    public function edit_category($id){
        $select_category=DB::table('tbl_category')
                                ->find($id);
        return view ('admin.edit_category')->with('select_category',$select_category);
    }
    public function update_category(Request $request){
        $data = [];
        $data['category_name']= $request->category_name;

        DB::table('tbl_category')
                                ->where('id' , $request->category_id)
                                 ->update($data);
        Session::put('message', 'The Category Update Succesfuly');

        return redirect('all_categories');
    }
}
