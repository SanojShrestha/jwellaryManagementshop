<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\siteDetail;

class siteDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $siteInfo=new siteDetail();
       $contactDetails=$siteInfo::first();
       	return view('Dashboard/ContactDetail/contactDetails',compact('contactDetails'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$siteInfo=new siteDetail();
    	$siteInfo->Address="bhartpur 13, chitwan";
    	$siteInfo->email="jonasahtserhs@gmail.com";
    	$siteInfo->phone="9845419812";
    	$siteInfo->save();
    	echo "yes details is added";

    }

   
    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {     $siteInfo=new siteDetail();
    	  $contactDetails=$siteInfo::find($id);
           return view('Dashboard/ContactDetail/updateContactDetails',compact('contactDetails'));
    }

    
    public function update(Request $request, $id)
    {
        
    }

   
    public function destroy($id)
    {
        
    }
}
