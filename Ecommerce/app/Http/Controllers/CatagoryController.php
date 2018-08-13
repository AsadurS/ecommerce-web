<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TblCategory;
use DB;
use Session;
class CatagoryController extends Controller
{
    public function index(){
    return view('admin.add_catagory');
    }
    public function all_catagory(){
      $allCatagory=TblCategory::orderBy('category_id','asc')->get();
      return view ('admin.all_catagory',compact('allCatagory'));
    }
    public function add_catagory(Request $request)
  //  `category_id`, `category_name`, `category_details`, `category_status`, `created_at`, `updated_at`)
    {
$data=array();
$data['category_id']=$request->category_id;
$data['category_name']=$request->cat_name;
$data['category_details']=$request->cat_details;
$data['category_status']=$request->cat_status;
DB::table('tbl_categories')->insert($data);
Session::put('message','succesfull');
 return redirect('/add-catagory');
    }
    public function unative_catagory($category_id){
DB::table('tbl_categories')
    ->where('category_id',$category_id)
    ->update(['category_status'=>0]);
    return redirect('/all-catagory');
    }
    public function ative_catagory($category_id){
DB::table('tbl_categories')
    ->where('category_id',$category_id)
    ->update(['category_status'=>1]);
    return redirect('/all-catagory');
    }
    public function edit_catagory($category_id){
      $update=TblCategory::where('category_id',$category_id)->findOrFail($category_id);
      return view('admin.edit-catagory',compact('update'));
    //  echo $category_id;
// $update=DB::table('tbl_categories')
//     ->where('category_id',$category_id)
//     ->first();
// return view('admin.edit-catagory',compact('update'));
    }
    public function update_catagory(Request $request , $category_id){
      // $category_id=$_POST['category_id'];
      // $up=TblCategory::where('category_id',$category_id)->update([
      //   'category_name'=>$_POST['cat_name'],
      //   'category_details'=>$_POST['cat_details']
      //
      // ]);
      //     return view('admin.all-catagory');

      $data=array();
    //  $data['category_id']=$request->category_id;
      $data['category_name']=$request->cat_name;
      $data['category_details']=$request->cat_details;
    //  $data['category_status']=$request->cat_status;
      DB::table('tbl_categories')
      ->where('category_id',$category_id)
      ->update($data);
      if(!empty($data)){
        Session::flash('success','value');
        return redirect('/all-catagory');
      }
      else{
        Session::flash('error','value');
        return redirect('/all-catagory');
      }

//print_r($data);
    }
public function delete($category_id){
  $delete=TblCategory::where('category_id',$category_id)->delete();
  Session::put('message','catagory delete succesfully');
    return redirect('/all-catagory');
}
}
