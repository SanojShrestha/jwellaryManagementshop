<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\contactUsList;
use Illuminate\Support\Facades\Session;

class peopleFeedbackController extends Controller
{
      public function index()
     {
     	
     $feedback=new contactUsList();
     $feedbackList=$feedback::paginate(10);
     return view('Dashboard/peopleFeedback/viewFeedback', compact('feedbackList'));

     }
    public function DeletePeopleFeedback(Request $request ,$id)
    {
     $feedback=new contactUsList();
     $deleteFeedbackId=$feedback->find($id);
     $deleteFeedbackId->delete();
     Session::flash("success","feedback deleted  succssfully");
     return redirect('userFeedback');
    }
}
