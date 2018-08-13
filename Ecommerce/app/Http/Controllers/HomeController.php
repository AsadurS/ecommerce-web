<?php

namespace App\Http\Controllers;
use carbon\carbon;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Message;
class HomeController extends Controller
{
  public function index()
  {
    $all_publish_product=DB::table('products')
    // ->join('contacts', 'users.id', '=', 'contacts.user_id')
    //     ->join('orders', 'users.id', '=', 'orders.user_id')
    //     ->select('users.*', 'contacts.phone', 'orders.price')
    //     ->get();
             ->join('tbl_categories', 'products.category_id', '=', 'tbl_categories.category_id')
             ->join('brands', 'products.id', '=', 'brands.id')
            ->select('products.*', 'tbl_categories.category_name', 'brands.brand_name')
            //->limit(3)
             ->get();
return view('website.home',compact('all_publish_product'));
    //  return view('website.home');
  }
  public function cat_type($category_id){
    $all=DB::table('products')
    ->join('tbl_categories', 'products.category_id', '=', 'tbl_categories.category_id')
//    ->join('brands', 'products.id', '=', 'brands.id')
   ->select('products.*', 'tbl_categories.category_name')
   ->where('tbl_categories.category_id',$category_id)
->get();
return view('website.cat',compact('all'));
  }
  public function brand_type($id){
    $brand=DB::table('products')
    ->join('brands','products.id','=','brands.id')
    ->select('products.*','brands.brand_name')
    ->where('brands.id',$id)
    ->get();
    return view('website.brand',compact('brand'));
  }
  public function pro_details($pro_id){
  $pro_details=DB::table('products')
  ->where('products.pro_id',$pro_id)
  ->get();
  return view('website.product-details',compact('pro_details'));
  }
  public function message(){
    $messIns=DB::table('messages')
    ->insert([
      'message_name'=>$_POST['message_name'],
      'message_email'=>$_POST['message_email'],
      'message_text'=>$_POST['message_text'],
      'created_at'=>carbon::now()
    ]);
    if(!empty($messIns)){
      Session::flash('success','value');
      return redirect('/product-details/{pro_id}');
    }
    else {
      Session::flash('success','value');
      return redirect('/product-details/{pro_id}');
    }
  }
  public function view_message(){
    $all_message=Message::all();
return view('admin.all-message',compact('all_message'));
  }
}
