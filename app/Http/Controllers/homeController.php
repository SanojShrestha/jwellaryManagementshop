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

  public function contact()
  {
    return view('home/contact');
}

public function showProducts()
{  
  $product=new product();
  $productList=$product::paginate(1);
  return view('home/product',compact('productList'));
}

public function register()
{
 return view('home/register');
}


public function singleProduct($id)
{     
  $product=new product();
  $singleProduct=$product::find($id);
  return  view('home/singleProduct',compact('singleProduct'));
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
 public function productByCategories($category_name)
 {
     $product=new product();
     $productList=$product::where('category_name',$category_name)
      ->orderBy('category_name', 'desc')
      ->paginate(9);

        return view('home/productByCategories',compact('productList','category_name'));




 }

}
