<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    public function save_slider(Request $request){
        $data = [];
        $data['description1']=$request->description1;
        $data['description2']=$request->description2;
        $data['slider_status']=@$request->slider_status == null ? 0 : 1;
        if ($request->hasFile('slider_image')){
            $image = $request->file('slider_image')->store('public/sliderimage');
            $data['slider_image'] =$image;
        }else{
            $data['slider_image']='sliderimage/Noimage.jpg';
        }
        DB::table('tbl_slider')->insert($data);
        Session::put('message' , 'The Slider Added Successfuly');
        return redirect('add_slider');

    }
    public function unactivate_slider($id){
        $data=[];
        $data['slider_status']=0;
        DB::table('tbl_slider')->where('id',$id)
                                    ->update($data);
        Session::put('message','The Status Unactivate Successfully');
        return redirect('all_sliders');
    }
    public function activate_slider($id){
        $data=[];
        $data['slider_status']=1;
        DB::table('tbl_slider')->where('id',$id)
                                    ->update($data);
        Session::put('message1','The Status Unactivate Successfully');
        return redirect('all_sliders');
    }
    public function delete_sliders($id){
        DB::table('tbl_slider')->where('id',$id)
                                    ->delete();
        Session::put('message2','The Product Deleted Successfully');
        return redirect('all_sliders');
    }
    public function edit_slider($id){
        $select_slider=DB::table('tbl_slider')
                            ->where('id',$id)
                             ->first();
        return view('admin.edit_slider')->with('select_slider',$select_slider);
    }
    public function update_slider(Request $request){
        $data = [];
        $data['description1']=$request->description1;
        $data['description2']=$request->description2;
        $data['slider_status']=@$request->slider_status == null ? 0 : 1;
        if ($request->hasFile('slider_image')){
            $image = $request->file('slider_image')->store('public/sliderimage');
            $data['slider_image'] =$image;
        }else{
            $data['slider_image']='sliderimage/Noimage.jpg';
        }
        DB::table('tbl_slider')->update($data)
                                    ->where('id',$request->id);
        Session::put('message' , 'The Slider Updated Successfuly');
        return redirect('all_sliders');
    }
}
