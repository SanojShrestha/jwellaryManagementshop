<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\siteDetail;
use Illuminate\Support\Facades\Session;

class siteDetailController extends Controller
{
	
	public function index()
	{
		$siteInfo=new siteDetail();
		$contactDetails=$siteInfo::first();
		return view('Dashboard/ContactDetail/contactDetails',compact('contactDetails'));

	}

	
	public function create()
	{
		$siteInfo=new siteDetail();
		$siteInfo->Address="bhartpur 13, chitwan";
		$siteInfo->email="jonasahtserhs@gmail.com";
		$siteInfo->phone="9845419812";
		$siteInfo->save();
		echo "yes details is added";

	}

	public function edit($id)
	{     $siteInfo=new siteDetail();
		$contactDetails=$siteInfo::find($id);
		return view('Dashboard/ContactDetail/updateContactDetails',compact('contactDetails'));
	}

	
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'Address'=>'required',
			'email'=>'required|email',
			'phone'=>'required|digits:10|max:12']);
		$siteInfo=new siteDetail();
		$contactDetails=$siteInfo::find($id);
		$contactDetails->Address =$request->Address;
		$contactDetails->email=$request->email;
		$contactDetails->phone=$request->phone;
		$contactDetails->save();
		Session::flash("success","site details updated succssfully");
		return redirect('contactDetails');
	}


	
}
