<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\order;
use Illuminate\Support\Facades\Session;

class userOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $order=new order();
       $orderList=$order::paginate(9);
      return view('Dashboard/userOrders/viewOrders',compact('orderList'));
    }

    public function destroy($id)
    {
        $order=new order();
        $DeleteOrder=$order::find($id);
        $DeleteOrder->delete();
        Session::flash("success","order cancelled succssfully");
        return redirect('userOrders');
    }
}
