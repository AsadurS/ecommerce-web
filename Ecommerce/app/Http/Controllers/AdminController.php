<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
Use DB;
session_start();
class AdminController extends Controller
{
    public function index(){
      return view('layouts.admin_login');
    }
    public function dashbord(){
    
    }
    public function admin_dashbord(Request $request){
$admin_name=$request->name;
$admin_pass=md5($request->pas);
$result=DB::table('tbl_admins')
->where('admin_name',$admin_name)
->where('admin_password',$admin_pass)
->first();
if ($result) {
  Session::put('admin_name',$result->admin_name);
  Session::put('admin_id',$result->admin_id);
  return redirect('/dashbord');
}
else {
  Session::flash('error','value');
  return redirect('/login');
}
    }
}
