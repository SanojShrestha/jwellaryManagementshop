<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\admin;
use Validator;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{


  public function index(Request $request)
  {

   $value = $request->session()->get('admin_log');
   if(isset($value))
   {
    return view('Dashboard.dashboard');

  }
  else
   {

    return view('login/adminlogin');
  }

}


  public function checkvalidate(Request $request)
  {


   $username =$request->username;
   $password=$request->password;
   $admin=new admin();
   $admindata=$admin::find(1);

   $validator = Validator::make($request->all(), [
              'username'=>'required|alpha',
    'password'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect('/adminlogin')
                        ->withErrors($validator)
                        ->withInput($validator);
        }
   if($admindata->name==$username && $admindata->password== $password) 
   {

     $request->session()->put('admin_log',"true");
     $request->session()->put('username',"$admindata->name");
      return redirect('dashboard/dashboard');



   }
   else 
   {
     $request->session()->flash('failled', 'plz check your username and password');
     return redirect('adminlogin');
   }


  }

     public function dashboard() 
   {
     return view('Dashboard.dashboard');
   }


  public function logout(Request $request)
  {
    $request->session()->flush();
    return redirect('adminlogin');
  }
}
