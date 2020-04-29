<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\PurchaseOrder;
use App\PurchaseItem;
use App\StockMove;
use App\Ledger;
use App\AccountingRecord;

class PurchaseController extends Controller
{
    public function index(){
      $orders=PurchaseOrder::all();
      return view('purchase.index',compact('orders'));
    }

    public function detail($id){
      $order=PurchaseOrder::where('id', $id)->first();
      $items=$order->items()->get();
      $stockmoves=$order->stockmoves()->get();
      $records=$order->accountingrecords()->get();
      return view('purchase.detail',compact('order','items','stockmoves','records'));
    }

    public function create(){
      return  view('purchase.create');
    }

    public function store(Request $request){
      $id="PUR".date('Ymd').uniqid();
      $order=new PurchaseOrder(array(
        'id'=>$id,
        'manufacture_id'=>$request->get('manufacture_id'),
        'vendor_id'=>$request->get('vendor_id'),
        'deliver_to'=>$request->get('deliver_to'),
        'payment_method'=>$request->get('payment_method'),
        'remark'=>$request->get('remark'),
      ));
      $order->save();
      $items=json_decode($request->get('it_post'), true);
      foreach($items as $item){
        $rid="PUI".date('YmdHis').uniqid();
        $pui=new PurchaseItem(array(
          'id'=>$rid,
          'order_id'=>$id,
          'product_id'=>$item['product_id'],
          'name'=>$item['name'],
          'quantity'=>$item['quantity'],
          'price'=>$item['price'],
          'subtotal'=>$item['subtotal']
        ));
        $pui->save();
      }
      return redirect('/purchase/create')->with('status','您的採購單已成功建立');
    }

    public function createStockMove($id){
      $order=PurchaseOrder::where('id', $id)->first();
      $items=$order->items()->get();
      foreach($items as $item){
        $sid="STM".date('YmdHis').uniqid();
        $sm=new StockMove(array(
          'id'=>$sid,
          'reference_id'=>$id,
          'product_id'=>$item->product_id,
          'name'=>$item->name,
          'source'=>$order->vendor_id,
          'destination'=>$order->deliver_to,
          'quantity'=>$item->quantity,
          'type'=>'入庫',
          'price'=>$item->price
        ));
        $sm->save();
      }
      return redirect('/purchase/detail/'.$id)->with('status','您的物流異動已成功建立');
    }

    public function createJournal($id){
      $order=PurchaseOrder::where('id', $id)->first();
      $items=$order->items()->get();
      $sum=0;
      foreach($items as $item){
        $rid="ACR".date('YmdHis').uniqid();
        $ledger=Ledger::where('dept', $item['product_id'])->first();
        $record=new AccountingRecord(array(
          'id'=>$rid,
          'batch_id'=>$id,
          'content'=>$ledger->name.'採購',
          'asset'=>$ledger->id,
          'liability'=>'',
          'amount'=>$item['subtotal'],
        ));
        $record->save();
        $sum=$sum+$item['subtotal'];
      }

      if($order->payment_method=="現金"){
        $ledger=Ledger::where('name', $order->dept.'零用金')->first();
        $rid="ACR".date('YmdHis').uniqid();
        $record=new AccountingRecord(array(
          'id'=>$rid,
          'batch_id'=>$id,
          'content'=>'採購付款',
          'asset'=>'',
          'liability'=>$ledger->id,
          'amount'=>$sum,
        ));
        $record->save();
      }

      return redirect('/purchase/detail/'.$id)->with('status','您的會計記錄已成功建立');
    }
}
