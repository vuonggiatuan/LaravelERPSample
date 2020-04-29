<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SaleOrder;
use App\SaleItem;
use App\StockMove;
use App\Ledger;
use App\AccountingRecord;

class SaleController extends Controller
{
    public function index(){
      $orders=SaleOrder::all();
      return view('sale.index',compact('orders'));
    }

    public function detail($id){
      $order=SaleOrder::where('id', $id)->first();
      $items=$order->items()->get();
      $stockmoves=$order->stockmoves()->get();
      $records=$order->accountingrecords()->get();
      return view('sale.detail',compact('order','items','stockmoves','records'));
    }

    public function create(){
      return view('sale.create');
    }

    public function store(Request $request){
      $id="SLO".date('Ymd').uniqid();
      $order=new SaleOrder(array(
        'id'=>$id,
        'date'=>$request->get('date'),
        'warehouse'=>$request->get('warehouse'),
        'customer_id'=>$request->get('customer_id'),
        'customer_name'=>$request->get('customer_name'),
        'customer_tel'=>$request->get('customer_tel'),
        'customer_add'=>$request->get('customer_add'),
        'status'=>'訂單建立',
      ));
      $order->save();
      $items=json_decode($request->get('it_post'), true);
      foreach($items as $item){
        $sid="SLI".date('YmdHis').uniqid();
        $sli=new SaleItem(array(
          'id'=>$sid,
          'order_id'=>$id,
          'product_id'=>$item['product_id'],
          'name'=>$item['name'],
          'unit'=>$item['unit'],
          'quantity'=>$item['quantity'],
          'price'=>$item['price'],
          'subtotal'=>$item['subtotal']
        ));
        $sli->save();
      }
      return redirect('/sale/create')->with('status','您的銷售訂單已成功建立');
    }

    public function createStockMove($id){
      $order=SaleOrder::where('id', $id)->first();
      $items=$order->items()->get();
      foreach($items as $item){
        $sid="STM".date('YmdHis').uniqid();
        $sm=new StockMove(array(
          'id'=>$sid,
          'reference_id'=>$id,
          'product_id'=>$item->product_id,
          'name'=>$item->name,
          'source'=>$order->warehouse,
          'destination'=>$order->customer_id,
          'quantity'=>$item->quantity,
          'type'=>'銷貨',
          'price'=>$item->price
        ));
        $sm->save();
      }
      return redirect('/sale/detail/'.$id)->with('status','您的物流異動已成功建立');
    }

    public function createJournal($id){
      $order=SaleOrder::where('id', $id)->first();
      $items=$order->items()->get();
      $sum=0;
      foreach($items as $item){
        $rid="ACR".date('YmdHis').uniqid();
        $ledger=Ledger::where('dept', $item['product_id'])->first();
        $record=new AccountingRecord(array(
          'id'=>$rid,
          'batch_id'=>$id,
          'content'=>$ledger->name.'銷貨',
          'asset'=>'',
          'liability'=>$ledger->id,
          'amount'=>$item['subtotal'],
        ));
        $record->save();
        $sum=$sum+$item['subtotal'];
      }
      if($order->payment_method=="現金"){
        $ledger=Ledger::where('name', $order->dept.'營業收入')->first();
        $rid="ACR".date('YmdHis').uniqid();
        $record=new AccountingRecord(array(
          'id'=>$rid,
          'batch_id'=>$id,
          'content'=>'銷貨付款',
          'asset'=>$ledger->id,
          'liability'=>'',
          'amount'=>$sum,
        ));
        $record->save();
      }
      return redirect('/sale/detail/'.$id)->with('status','您的會計記錄已成功建立');
    }
}
