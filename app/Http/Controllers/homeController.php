<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\product;
use App\contactUsList;

class homeController extends Controller
{

    public function index()
    {
      $product=new product();
      $productList=$product::all();
      return view('home/index',compact('productList','categoryList'));
    }

    public function about()
    {
     echo "this is about page";
    }
    public function contact()
    {
        return view('home/contact');
    }
    public function showProducts()
    {
    	  return view('home/product');

    }
    public function register()
    {
        
    return view('home/register');
    }
    

    public function single()
    {

    	return  view('home/single');
    }
    public function checkforExitingEmail(Request $request)
    {
     $addContact=new contactUsList();
     $db_email=$addContact::where("email",$request->userEmail)->first();
     if($db_email)
     {
       echo "you already  in our contact list ";
     }
     else
      {
     $addContact->name=$request->userName;
     $addContact->email=$request->userEmail;
     $addContact->comment=$request->userComment;
     $addContact->save();
     echo "thank you for giving us your feedback";
  }




   }
}
