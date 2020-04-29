<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Storage;

class StorageController extends Controller
{
  public function index(){
    $storages=Storage::all();
    return view('inventory.storageindex',compact('storages'));
  }

  public function create(){
    return view('inventory.createstorage');
  }

  public function store(Request $request){
    $id="STO".date('Ymd').uniqid();
    $storage=new Storage(array(
      'id'=>$id,
      'name'=>$request->get('name'),
    ));
    $storage->save();
    return redirect('/inventory/newstorage')->with('status','您的倉儲資料已成功建立');
  }

  public function detail($id){
    $storage=Storage::where('id', $id)->first();
    $items=$storage->items()->get();
    return view('inventory.storagedetail',compact('storage','items'));
  }
}
