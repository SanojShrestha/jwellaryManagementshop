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
       Session::flash("success","one category addeed succssfully");
      return redirect('product');
       }
     else {
        Session::flash("failled","one category addeed succssfully");
        return back();
     }
    
   }
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
        echo "this is edit page ";

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
      $product=new product();
      $DeleteProduct=$product::find($id);
      $DeleteProduct->delete();
      Session::flash("success","one product delted succssfully");
      return redirect('product');
    }
}
