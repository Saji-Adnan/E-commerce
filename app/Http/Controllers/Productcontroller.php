<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Productcontroller extends Controller
{
    public function save_product(Request $request){
      if($request->product_category == 'Select Category'){
          Session::put('message1' , 'Must Select Category');
          return redirect('add_product');
      }else{

          $data = [];
          $data['product_name']= @$request->product_name;
          $data['product_price']= @$request->product_price;
          $data['product_category']= @$request->product_category;
          $data['product_status']= @$request->product_status == null ? 0 : 1;

          if ($request->hasFile('product_image')){
              $image = $request->file('product_image')->store('public/productimage');
              $data['product_image'] =$image;
          }else{
              $data['product_image']='productimage/NoImage.jpg';
          }
          DB::table('tbl_products')->insert($data);
          Session::put('message' , 'The Product Added successfuly');

          return redirect('add_product');
      }
    }

    public function select_product_by_category($category_name){
//         print('the select cat is'.$category_name);
        $tbl_products= DB::table('tbl_products')->get()
            ->where('product_status', 1)
            ->where('product_category', $category_name);

        return view('client.shop')
            ->with('tbl_products',$tbl_products);
//        return view('layoute.app')
//            ->with('client.shop', $manage_product);
    }
    public function unactivate_product($id){
        $data=[];
        $data['product_status']=0;
        DB::table('tbl_products') ->where('id',$id)
                                         ->update($data);
        Session::put('message' ,'The Status Uncativated Successfully');
        return redirect('all_products');
    }
    public function activate_product($id){
      $data=[];
      $data['product_status']=1;
      DB::table('tbl_products')->where('id',$id)
                                    ->update($data);
      Session::put('message1' , 'The Status Aativated Successfully');
      return redirect('all_products');
    }
    public function delete_product($id){
        DB::table('tbl_products')->where('id',$id)
                                        ->delete();
        Session::put('message2' , 'The Product Deleted Successfully');
        return redirect('all_products');
    }
    public function edit_product($id){
        $select_product=DB::table('tbl_products')
                                ->where('id',$id)
                                ->first();
        return view('admin.edit_product')->with('select_product',$select_product);
    }
    public function update_product( Request $request){
        if($request->product_category == 'Select Category'){
            Session::put('message1' , 'Must Select Category');
            return redirect('add_product');
        }else{

            $data = [];
            $data['product_name']= @$request->product_name;
            $data['product_price']= @$request->product_price;
            $data['product_category']= @$request->product_category;
            $data['product_status']= @$request->product_status == null ? 0 : 1;

            if ($request->hasFile('product_image')){
                $image = $request->file('product_image')->store('public/productimage');
                $data['product_image'] =$image;
            }else{
                $data['product_image']='productimage/NoImage.jpg';
            }
            DB::table('tbl_products')->where('id',$request->product_id)->update($data);
            Session::put('message' , 'The Product Updated successfuly');

            return redirect('all_products');
        }
    }
}
