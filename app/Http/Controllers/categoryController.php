<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\product_category;
use Illuminate\Support\Facades\Session;


class categoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category=new product_category();
        $categorylist=$category::paginate(4);
        $data = $request->session()->all();
       return view('Dashboard/category/viewcategory')->with('categorylist',$categorylist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('Dashboard/category/addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
  
        
        $category=new product_category();
        $category->category_name=$request->category_name;
        $category->catgory_description=$request->category_description;
        $category->save();
        Session::flash("success","one category addeed succssfully");
        return redirect('category');

       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "this is show method";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category=new product_category();
         $singlecategory=$category->find($id);
         return view('Dashboard/category/editcategory')->with('category',$singlecategory);
        
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

            $category=new product_category();
            $editCategory=$category::find($id);
            $editCategory->category_name =$request->category_name;
            $editCategory->catgory_description=$request->category_description;
            $editCategory->save();
            Session::flash("success","one category modified succssfully");
            return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $category=new product_category();
     $Deletecategory=$category::find($id);
     $Deletecategory->delete();
     Session::flash("success","one category delted succssfully");
     return redirect('category');


    }
}
