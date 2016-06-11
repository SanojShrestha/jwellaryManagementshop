<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Session;
use Hash;

class userProfileController extends Controller
{
	public function __construct(){

		$this->middleware('auth');
	}
	public function index()
	{ 
		$users=new User();
		$userId=Auth::user()->id;
		$userInfo=$users::find($userId);
		return view("userProfile/index",compact('userInfo'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$user=new User();
    	$singleUser=$user::find($id);
    	return view('userProfile.edit',compact('singleUser'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    	Session::flash("success","your changes updated succssfully");
    	return redirect('userProfile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
    // public function viewOrders()
    // {


    // }
    // public function deleteOrders()
    // {

    // }
}
