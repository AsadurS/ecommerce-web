<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class SuperAdminController extends Controller
{
  public function index(){
    $this->AuthCheck();
      return view('admin.dashbord');
  }
    public function logout(){
  //    Session::put('admin_name',null);
  //    Session::put('admin_id',null);
  Session::flush();
      return redirect('/login');
    }
public function AuthCheck(){
  $admin_id=Session::get('admin_id');
  if($admin_id){
    return;
  }
  else{
    return redirect('/a/login')->send();
  }
}
}
