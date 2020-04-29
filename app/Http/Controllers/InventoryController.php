<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\StockMove;
use App\StorageItem;

class InventoryController extends Controller
{
    public function stockmove(){
      $records=StockMove::all();
      return view('inventory.stockmove',compact('records'));
    }

    public function stockmovedetail($id){
      $record=StockMove::where('id', $id)->first();
      //$items=$order->items()->get();
      return view('inventory.stockmovedetail',compact('record'));
    }

    public function stockmovestatus($id,$status){
      echo $id;
      echo $status;
      $record=StockMove::where('id', $id)->first();

      if($status=="已入庫"){
        if (StorageItem::where('storage_id',$record->destination)->where('product_id', $record->product_id)->exists()) {
          $storageitem=StorageItem::where('storage_id',$record->destination)->where('product_id', $record->product_id)->first();
          $storageitem->quantity=$storageitem->quantity+$record->quantity;
          $storageitem->save();
        } else {
          $stiid='STI'.date('Ymd').uniqid();
          $storageitem=new StorageItem(array(
            'id'=>$stiid,
            'product_id'=>$record->product_id,
            'storage_id'=>$record->destination,
            'quantity'=>$record->quantity,
            'price'=>$record->price,
            'unit'=>$record->unit,
          ));
          $storageitem->save();
        }
      }
      $record->status = $status;
      $record->save();
      return redirect('/inventory/stockmovedetail/'.$id)->with('status','資料已成功修改');
    }
}
