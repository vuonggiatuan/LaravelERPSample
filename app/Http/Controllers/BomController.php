<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\BomComponent;
class BomController extends Controller
{
    public function index(){
      $products=Product::all();
      return view('bom.index',compact('products'));
    }

    public function detail($id){
      $product=Product::where('id', $id)->first();
      $components=$product->components()->get();
      return view('bom.detail',compact('product','components'));
    }

    public function newcomponent(Request $request){
      $id="PBC".date('Ymd').uniqid();
      $component=new BomComponent(array(
        'id'=>$id,
        'product_id'=>$request->get('product_id'),
        'material_id'=>$request->get('material_id'),
        'name'=>$request->get('name'),
        'unit'=>$request->get('unit'),
        'quantity'=>$request->get('quantity')
      ));
      $component->save();
      return redirect('/bom/detail/'.$request->get('product_id'))->with('status','您的項目已成功建立');
    }
}
