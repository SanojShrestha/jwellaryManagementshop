<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\product;
use App\contactUsList;
use App\order;
use App\cart;
use Auth;
use DB;

class homeController extends Controller
{

  public function index()
  {
    $product=new product();
    $productList=$product::simplePaginate(9);
    return view('home/index',compact('productList','categoryList'));
  }

  public function contact()
  {
    return view('home/contact');
  }

  public function showProducts()
  {  
    $product=new product();
    $productList=$product::orderBy('category_name', 'desc')->paginate(9);
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
public function reviewAndShop()
{   $cart=new cart();
    $cartItems=$cart::where('order_user_id',Auth::user()->id)->get();
    $cart1=new cart();
    $totalPrice=$cart1::where('order_user_id',Auth::user()->id)->sum('product_price');
   return  view('home/reviewAndShop',compact('cartItems','totalPrice'));
}

public function order( Request $request)
{
 $cart=new cart();
 $cartItems=$cart::select('product_name','product_category','order_user_id','ordered_user','product_price')
  ->where('order_user_id',Auth::user()->id)->get();
   $i=1;
   foreach($cartItems as $items)
{ 
  $order="order";
   $order=new order();
   $orderTemp=$order::where([
    ['product_name',$items->product_name],
    ['order_user_id',$items->order_user_id]
    ])->get()->toArray();
   if($orderTemp==null){

   }
   else {
    Session::flash("success","some items are alerdy present in your order plz check it again!");
      return redirect('reviewAndShop');
   }
}
foreach($cartItems as $items)
{ 
  $order="order";
   $order.$i=new order();
   $order.$i->product_name=$items->product_name;
   $order.$i->product_category=$items->product_category;
   $order.$i->ordered_user=$items->ordered_user;
   $order.$i->order_user_id=$items->order_user_id;
   $order.$i->product_price=$items->product_price;
   $order.$i->save();
    DB::table('products')
                ->where('product_name', $items->product_name)
                ->update(['order_user_id' => $items->order_user_id]);
   $i++;
}
$cart1=new cart();
$cart::where('order_user_id',Auth::user()->id)->delete();
 Session::flash("success","items is succsssfuly added to your list");
  return redirect('reviewAndShop');
}

public function add_to_cart( Request $request)
{
  $this->validate($request,[
    'product_name'=>'required',
    'order_user_id'=>'required',
    'ordered_user' =>'required',
    'product_price'=>'required',
    'product_category' =>'required'
    ]);
  $cart=new cart();
  if( $cart::where([
    ['product_name',$request->product_name],
    ['order_user_id',$request->order_user_id],
    ])->first()) 
  {
    Session::flash("failled","item is already in your cart!");
    return redirect()->back();
  }
  $cart->product_name=$request->product_name;
  $cart->ordered_user=$request->ordered_user;
  $cart->order_user_id=$request->order_user_id;
  $cart->product_category=$request->product_category;
  $cart->product_price=$request->product_price;
  $cart->save();
  Session::flash("success","item is added to your cart");
 return redirect()->back();
}

public function remove_from_cart( Request $request)
{
  $cart=new cart();
  $product_name=$request->product_name;
  $user_id=$request->user_id;
  $deletedCartItem =cart::where([
    ['product_name',$product_name],
    ['order_user_id',$user_id],
    ])->delete();
  $cart1=new cart();
    $totalPrice=$cart1::where('order_user_id',Auth::user()->id)->sum('product_price');
  return $totalPrice;
}

}
