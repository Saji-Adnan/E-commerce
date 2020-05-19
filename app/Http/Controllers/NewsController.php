<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function Showdata(){
        $all_news = News::orderBy('id','desc')->get();
        $soft_delete = News::onlyTrashed()->orderBy('id','desc')->get();
        return view('layoute.test',['all_news'=>$all_news , 'soft_delete'=>$soft_delete]);
    }
    public function Store(Request $request){
        $attribute=[
            'title'=>'title',
            'add_by'=>'User',
            'desc'=>' description',
            'status'=>' status',
        ];
        $this->validate(request(),[
            'title'=>'required',
            'add_by'=>'required',
            'desc'=>'required',
            'status'=>'required'
            ],[], $attribute
        );
     $add = new News;
     $add->title = $request->title;
     $add->desc = $request->desc;
     $add->status = $request->status;
     $add->add_by = $request->add_by;
     $add->save();
     session()->flash('message','Add New Record');
     return redirect('all/news');
    }
    public function destroy($id){
        $del=News::find($id);
        $del->delete();
        return redirect('all/news');
    }
}
