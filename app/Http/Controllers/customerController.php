<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class customerController extends Controller
{

	public function index()
	{
		$customer=new customer();  
		$customerList=$customer::paginate(5);
		return view('Dashboard/customer/viewCustomer')->with('customerList',$customerList);
	}

	public function create()
	{
		return view('Dashboard/customer/addCustomer');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'customer_name'=>'required|alpha',
			'customer_address'=>'required',
			'customer_phoneNumber'=>'required|Numeric',
			'customer_email'=>'required',
			'customer_image'=>'required|mimes:jpeg,jpg,png',
			'customer_shortInfo' =>'required'
			]);
		$customer=new customer();
		$customer->customer_name=$request->customer_name;
		$customer->customer_address=$request->customer_address;
		$customer->customer_phoneNumber=$request->customer_phoneNumber;
		$customer->customer_email=$request->customer_email;
		$image=$request->file('customer_image');
		$customer->customer_image=$image->getClientOriginalName();
		$customer->customer_shortInfo=$request->customer_shortInfo;   
		$upload_directory=public_path().'/uploads/customer_images';
		$moveImage=$image->move($upload_directory,$image->getClientOriginalName());
		if($moveImage)
		{
			$customer->save();
			Session::flash("success","one product addeed succssfully");
			return redirect('customer');
		}
		else {
			Session::flash("failled","problem occur while uploading file plz try later");
			return back();
		}
	}

	public function show($id)
	{
		$customer=new customer();
		$singleCustomer=$customer->find($id);
		return view('Dashboard/customer/viewSingleCustomer')->with('singleCustomer',$singleCustomer);
	}


	public function edit($id)
	{
		$customer=new customer();
		$editCustomer=$customer::find($id);
		return view('Dashboard/customer/editCustomer')->with('editCustomer',$editCustomer);
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'customer_name'=>'required|alpha',
			'customer_address'=>'required',
			'customer_phoneNumber'=>'required|Numeric',
			'customer_email'=>'required',
			'customer_image'=>'required|mimes:jpeg,jpg,png',
			'customer_shortInfo' =>'required'
			]);
		$customerData=new customer();
		$customer=$customerData::find($id);
		$customer->customer_name=$request->customer_name;
		$customer->customer_address=$request->customer_address;
		$customer->customer_phoneNumber=$request->customer_phoneNumber;
		$customer->customer_email=$request->customer_email;
		$image=$request->file('customer_image');
		$customer->customer_image=$image->getClientOriginalName();
		$customer->customer_shortInfo=$request->customer_shortInfo;   
		$upload_directory=public_path().'/uploads/customer_images';
		$moveImage=$image->move($upload_directory,$image->getClientOriginalName());
		if($moveImage)
		{
			$customer->save();
			Session::flash("success","product modified succssfully");
			return redirect('customer');
		}
		else {
			Session::flash("failled","problem occur while uploading file plz try later");
			return back();
		}
	}

	public function destroy($id)
	{
		$customer=new customer();
		$DeleteCustomer=$customer::find($id);
		$DeleteCustomer->delete();
		Session::flash("success","one customer delted succssfully");
		return redirect('customer');
	}
}
