<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Session;
use Hash;
use App\order;
class userProfileController extends Controller
{
	public function __construct(){

		$this->middleware('auth');
	}
    public function myOrders()
    {   $order=new order();
        $order1=new order();
        $myOrders=$order::where('order_user_id',Auth::user()->id)->paginate(9);
         $totalPrice=$order1::where('order_user_id',Auth::user()->id)->sum('product_price');
       return view("userProfile/myOrders",compact('myOrders','totalPrice'));
    }
	public function index()
	{ 
		$users=new User();
		$userId=Auth::user()->id;
		$userInfo=$users::find($userId);
		return view("userProfile/index",compact('userInfo'));
	}


    public function edit($id)
    {
    	$user=new User();
    	$singleUser=$user::find($id);
    	return view('userProfile.edit',compact('singleUser'));


    }


    public function update(Request $request, $id)
    {
    	
    	$this->validate($request,[
    		'name' =>'required',
    		'phone_number' =>'required',
    		'address' =>'required',
    		]);
    	$users=new User();
    	$user=$users::find(2);

    	$user->name=$request->name;
    	$user->address=$request->address;
    	$user->phone_number=$request->phone_number;
    	$user->save();
    	return redirect('userProfile');

    }

    public function destroy($id)
    {
        $order=new order();
        $myOrders=$order::find($id)->delete();
       Session::flash("success","your changes updated succssfully");
       return redirect('myOrders');
    }
    public function changePassword($id)
    {   $userId=$id;
    	return view('userProfile/changePassword',compact('userId'));
    }
    public function updatePassword(Request $request,$id)
    {
    	$this->validate($request, [
    		'old_password'=>'required',
    		'password' => 'required|min:6',
    		]);
    	$users=new User();
    	$user=$users::find($id);
    	$hashedPassword=$user->password;
    	if (Hash::check($request->old_password, $hashedPassword)) 
    	{
    		$user->password=bcrypt($request->password);
    		$user->save();
    		Session::flash("success","your Password updated succssfully");
    		return redirect('userProfile');
    	}
    	else {

    		$request->session()->flash('failled', 'wrong password');
    		return back();
    	}
    }
    
}
