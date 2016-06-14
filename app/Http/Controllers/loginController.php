<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\admin as Admin;
class loginController extends Controller
{
  public function index(Request $request)
  {
    $value = $request->session()->get('admin_log');
    if(isset($value)) 
    { 
            return redirect('dashboard/dashboard');
    }
    return view('login/adminlogin');
  }

  public function checkvalidate(Request $request)
  {
      return redirect('dashboard/dashboard');
//     $this->validate($request, ['username'=>'required|alpha','password'=>'required']);
//     $admindata=Admin::find(1);
//     $hashedPassword=$admindata->password;
//     if (Hash::check($request->password, $hashedPassword))
//     {
//       if($admindata->name=$request->username)
//       {
//       $request->session()->put('admin_log',"true");
//       $request->session()->put('username',"$admindata->name");
//
//      }
//    }
//     else
//     {
//      $request->session()->flash('failled', 'plz check your username and password');
//      return redirect('adminlogin');
//     }
  }

  public function dashboard(Request $request) 
  {
     $value = $request->session()->get('admin_log');
    if(isset($value)) { 
      return view('Dashboard.dashboard');
    }
    else {
      return redirect('adminlogin');

    }

  }

  public function logout(Request $request)
  {
    $request->session()->flush();
    return redirect('adminlogin');
  }
  public function forgotPassword()
  {

    return "this is for forgot password recovery systems function";
  }
}
