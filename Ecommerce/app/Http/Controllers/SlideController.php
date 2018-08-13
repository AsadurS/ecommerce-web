<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Slider;
use Image;
class SlideController extends Controller
{
    public function index(){
      return view('admin.slider');
    }
    public function add_slider(Request $request){
      $ins=DB::table('sliders')->insertGetId([
        'slider_image'=>'',
        'slider_head'=>$_POST['slider_head'],
        'slider_subHead'=>$_POST['slider_subHead'],
        'slider_details'=>$_POST['slider_details'],
        'slider_link'=>$_POST['slider_link'],
        'slider_status'=>$_POST['slider_status'],
  ]);
  if($request->hasFile('slider_image')){
    $image=$request->file('slider_image');
    $ImageName='Slider-'.$ins.'-'.time().'-'.$image->getClientOriginalExtension();
    Image::make($image)->save(base_path('public/uplpads/slider/').$ImageName);

  }

  DB::table('sliders')->where('slider_id',$ins)
  ->update([
    'slider_image'=>$ImageName
  ]);
    }
    public function all_slider(){
      $all=DB::table('sliders')->get();
      return view('admin.all_slider',compact('all'));
    }
}
