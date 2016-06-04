<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\product_category;
use Illuminate\Support\Facades\Session;


class categoryController extends Controller
{
    public function index(Request $request)
    {
        $category=new product_category();
        $categorylist=$category::paginate(4);
        $data = $request->session()->all();
        return view('Dashboard/category/viewcategory')->with('categorylist',$categorylist);
    }

    public function create()
    {
      return view('Dashboard/category/addcategory');
    }

    public function store(Request $request)
    {  

     $this->validate($request, array(
        'category_name' =>'required|alpha',
        'category_description' =>'required|alpha'       
         ));
     
      $category=new product_category();
      $category->category_name=$request->category_name;
      $category->catgory_description=$request->category_description;
      $category->save();
      Session::flash("success","one category addeed succssfully");
      return redirect('category');
    }

    public function show($id)
    {
      echo "<h1>this method is not found</h1>";
    }

    public function edit($id)
    {
       $category=new product_category();
       $singlecategory=$category->find($id);
       return view('Dashboard/category/editcategory')->with('category',$singlecategory); 
    }

    public function update(Request $request, $id)
    {      
       $category=new product_category();
       $editCategory=$category::find($id);
       $editCategory->category_name =$request->category_name;
       $editCategory->catgory_description=$request->category_description;
       $editCategory->save();
       Session::flash("success","one category modified succssfully");
       return redirect('category');
    }

    public function destroy($id)
    {
      $category=new product_category();
      $Deletecategory=$category::find($id);
      $Deletecategory->delete();
      Session::flash("success","one category delted succssfully");
      return redirect('category');
    }
}
