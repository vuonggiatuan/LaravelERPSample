<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Customer;

class CustomerController extends Controller
{
    public function index(){
      $customers=Customer::all();
      return view('customer.index',compact('customers'));
    }

    public function create(){
      return view('customer.create');
    }

    public function store(Request $request){
      $customer=new Customer(array(
        'id'=>$request->get('id'),
        'name'=>$request->get('name'),
      ));
      $customer->save();
      return redirect('/customer')->with('status','您的客戶資料已成功建立');
    }
}
