<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\contactUsList;

class peopleFeedbackController extends Controller
{
      public function index()
     {
     	
     $feedackList=new contactUsList();
     return view('Dashboard/peopleFeedback/viewFeedback', compact('feedackList'));

     }
}
