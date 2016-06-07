<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class homeController extends Controller
{
    public function index()
    {
     return view('home/index');
    }

    public function about(){

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
}
