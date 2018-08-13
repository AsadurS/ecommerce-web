<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Product;
use Session;
use Image;
use DB;
use App\Brand;
use App\TblCategory;
class ProductController extends Controller
{
    public function index(){
      return view('admin.add-product');
    }
    public function insert(Request $request){
      $insert=Product::insertGetId([
'pro_name'=>$_POST['pro_name'],
'category_id'=>$_POST['category_id'],
'id'=>$_POST['id'],
'pro_short_des'=>$_POST['pro_short_des'],
'pro_long_des'=>$_POST['pro_long_des'],
'pro_price'=>$_POST['pro_price'],
'pro_image'=>'',
'pro_size'=>$_POST['pro_size'],
'pro_color'=>$_POST['pro_color'],
'pro_status'=>$_POST['pro_status'],
'created_at'=>carbon::now('Asia/Dhaka')
      ]);
    if($request->hasFile('pro_image')){
      $image=$request->file('pro_image');
      $ImageName='Product-'.$insert.'-'.time().'-'.$image->getClientOriginalExtension();
      Image::make($image)->resize(100, 100)->save(base_path('public/uplpads/').$ImageName);

    }

    Product::where('pro_id',$insert)
    ->update([
      'pro_image'=>$ImageName
    ]);
    if($insert){
      Session::flush('success','value');
      return redirect('/add-product');
    }
    else{
      Session::flush('error','value');
      return redirect('/add-product');
    }
    }
    public function all_product(){
      $allProduct=DB::table('products')
      // ->join('contacts', 'users.id', '=', 'contacts.user_id')
      //     ->join('orders', 'users.id', '=', 'orders.user_id')
      //     ->select('users.*', 'contacts.phone', 'orders.price')
      //     ->get();
               ->join('tbl_categories', 'products.category_id', '=', 'tbl_categories.category_id')
               ->join('brands', 'products.id', '=', 'brands.id')
//               ->select('products.*', 'tbl_categories.category_name', 'brands.brand_name')
               ->get();
return view('admin.all-product',compact('allProduct'));
    }
    public function edit($id){
      $edit=Product::where('pro_id',$id)->findOrFail($id);
      $var=brand::all();
    $selectedRole = Product::first()->id;
      return view('admin.edit-product',compact('edit','var','selectedRole'));
    }
    
}
