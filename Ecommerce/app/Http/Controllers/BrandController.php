<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Brand;
use Session;
class BrandController extends Controller
{
  public function index(){
    return view('admin.add-brand');
  }
  public function inter(){
    $inst=Brand::insert([
//'created_at'=>carbon::now()
      'brand_name'=>$_POST['brand_name'],
      'brand_details'=>$_POST['brand_details'],
      'brand_status'=>$_POST['brand_status']
    ]);
    return view('admin.add-brand');
  }
  public function all(){
    $allBrand=DB::table('brands')->get();
    return view('admin.all-brand',compact('allBrand'));
  }
  public function active($ida){
    DB::table('brands')
    ->where('id',$ida)
    ->update(['brand_status'=>1]);
    return redirect('/all-brand');
  }
  public function unactive($ida){
    DB::table('brands')
    ->where('id',$ida)
    ->update(['brand_status'=>0]);
    return redirect('/all-brand');
  }
  public function delete($delete){
    DB::table('brands')->where("id",$delete)->delete();
      return redirect('/all-brand');
  }
  public function edit($edit){
    $asa=Brand::where('id',$edit)->first();
    return view('admin.edi-brand',compact('asa'));
  }
public function update($id){
  $asadur=Brand::where('id',$id)
  ->update([
    'brand_name'=>$_POST['name'],
    'brand_details'=>$_POST['details']
  ]);
  if ($asadur) {
    Session::flash('message','value');
    return redirect('/all-brand');
  }
  else{
    Session::flash('err','value');
    return redirect('/all-brand');
  }
  // Session::put('ja','hoise');
  // return redirect('/all-brand');

}
}
