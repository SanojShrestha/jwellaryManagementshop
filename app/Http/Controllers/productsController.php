<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\product_category as Category;
use App\Http\Requests;
use App\product;
use Illuminate\Support\Facades\Session;

class productsController extends Controller
{

    public function index()
    {
        $product=new product();
        $productList=$product->paginate(3);
        return view('Dashboard/product/viewProduct')->with('productList',$productList);
    }

    
    public function create()
    {  
        $category=new Category();
        $categoryList=$category::all();
        return view('Dashboard/product/addProduct')->with('categoryList',$categoryList);

    }

    public function store(Request $request)
    {
       $this->validate($request, [
           'product_name'=>'required|alpha',
           'product_quantity'=>'required|Integer',
           'product_weight'=>'required|Numeric',
           'product_firstImage'=>'required|mimes:jpeg,jpg,png',
           'product_secondImage'=>'required|mimes:jpeg,jpg,png',
           'product_note' =>'required',
           'category_id' =>'required|Integer']);
       $product=new product();
       $product->product_name=$request->product_name;
       $product->product_quantity=$request->product_quantity;
       $product->product_weight=$request->product_weight;
       $firstImage=$request->file('product_firstImage');
       $product->product_firstImage=$firstImage->getClientOriginalName();
       $secondImage=$request->file('product_secondImage');
       $product->product_secondImage=$secondImage->getClientOriginalName();
       $product->product_note=$request->product_note;
       $product->category_id=$request->category_id;
       $upload_directory=public_path().'/uploads/product_images';
       $moveFirstImage=$firstImage->move($upload_directory,$firstImage->getClientOriginalName());
       $moveSecondImage=$secondImage->move($upload_directory,$secondImage->getClientOriginalName());
       if($moveFirstImage && $moveSecondImage)
       {
       $product->save();
       Session::flash("success","one product addeed succssfully");
      return redirect('product');
       }
     else {
        Session::flash("failled","problem occur while uploading file plz try later");
        return back();
     }
    
   }
   public function show($id)
   {
          $product=new product();
          $singleProduct=$product->find($id);
        return view('Dashboard/product/viewSingleProduct')->with('singleProduct',$singleProduct);
   }
    public function edit($id)
    {    $category=new Category();
        $categoryList=$category::all();
        $product=new product();
        $editProduct=$product->find($id);
      return view('Dashboard/product/editProduct')->with('editProduct',$editProduct)->with('categoryList',$categoryList);

    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'product_name'=>'required|alpha',
           'product_quantity'=>'required|Integer',
           'product_weight'=>'required|Numeric',
           'product_firstImage'=>'required|mimes:jpeg,jpg,png',
           'product_secondImage'=>'required|mimes:jpeg,jpg,png',
           'product_note' =>'required',
           'category_id' =>'required|Integer']);
       $products=new product();
       $product=$products::find($id);
       $product->product_name=$request->product_name;
       $product->product_quantity=$request->product_quantity;
       $product->product_weight=$request->product_weight;
       $firstImage=$request->file('product_firstImage');
       $product->product_firstImage=$firstImage->getClientOriginalName();
       $secondImage=$request->file('product_secondImage');
       $product->product_secondImage=$secondImage->getClientOriginalName();
       $product->product_note=$request->product_note;
       $product->category_id=$request->category_id;
       $upload_directory=public_path().'/uploads/product_images';
       $moveFirstImage=$firstImage->move($upload_directory,$firstImage->getClientOriginalName());
       $moveSecondImage=$secondImage->move($upload_directory,$secondImage->getClientOriginalName());
       if($moveFirstImage && $moveSecondImage)
       {
       $product->save();
       Session::flash("success"," product modified succssfully");
      return redirect('product');
       }
     else {
        Session::flash("failled","problem occur while uploading file plz try later");
        return back();
     }
    }

    public function destroy($id)
    { 
      $product=new product();
      $DeleteProduct=$product::find($id);
      $DeleteProduct->delete();
      Session::flash("success","one product delted succssfully");
      return redirect('product');
    }
}
