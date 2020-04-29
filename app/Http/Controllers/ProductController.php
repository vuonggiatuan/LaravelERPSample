<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\ManufactureOrder;
use App\ManufactureOrderItem;
use App\ManufactureProcess;
use App\ProductProcess;
use App\StockMove;
use App\Ledger;
use App\AccountingRecord;

class ProductController extends Controller
{
    public function index(){
      $products=Product::all();
      return view('product.view',compact('products'));

    }

    public function detail($id){
      $product=Product::where('id', $id)->first();
      $storages=$product->storages()->get();
      $processes=$product->processes()->get();

      return view('product.detail',compact('product','storages','processes'));
    }

    public function create(){
      return view('product.create');
    }

    public function store(Request $request){
      $id='PRT'.date('Ymd').uniqid();
      $product=new Product(array(
        'id'=>$id,
        'name'=>$request->get('name'),
      ));
      $product->save();
      return redirect('/product/create')->with('status','您的產品資料已成功建立');
    }

    public function orderlist(){
      $orders=ManufactureOrder::all();
      return view('product.orderlist',compact('orders'));
    }

    public function createorder(){
      return view('product.createorder');
    }

    public function storeorder(Request $request){
      $id='MNO'.date('Ymd').uniqid();
      $order=new ManufactureOrder(array(
        'id'=>$id,
        'product_id'=>$request->get('product_id'),
        'quantity'=>$request->get('quantity'),
        'dept'=>$request->get('dept'),
        'scheduled_date'=>$request->get('scheduled_date'),
        'status'=>'規劃中',
      ));
      $order->save();
      $product=Product::where('id', $request->get('product_id'))->first();
      $components=$product->components()->get();
      foreach($components as $component){
        $item=new ManufactureOrderItem(array(
          'id'=>'MOI'.date('Ymd').uniqid(),
          'order_id'=>$id,
          'material_id'=>$component->material_id,
          'name'=>$component->name,
          'scheduled_quantity'=>$component->quantity*$request->get('quantity'),
          'consumed_quantity'=>0,
          'unit'=>$component->unit,
        ));
        $item->save();
      }
      return redirect('/product/orderdetail/'.$id)->with('status','您的生產工單已成功建立');
    }

    public function orderdetail($id){
      $order=ManufactureOrder::where('id', $id)->first();
      $items=$order->items()->get();
      $stockmoves=$order->stockmoves()->get();
      $processes=$order->processes()->get();
      $records=$order->accountingrecords()->get();
      return view('product.orderdetail',compact('order','items','stockmoves','processes','records'));
    }

    public function createprocess($id){
      $product=Product::where('id', $id)->first();
      return view('product.createprocess',compact('product'));
    }

    public function storeprocess(Request $request){
      $id='PRC'.date('Ymd').uniqid();
      $process=new ProductProcess(array(
        'id'=>$id,
        'product_id'=>$request->get('product_id'),
        'name'=>$request->get('name'),
        'percent'=>$request->get('percent'),
      ));
      $process->save();
      return redirect('/product/detail/'.$request->get('product_id'))->with('status','您的製程資料已成功建立');
    }

    public function createStockMove($id){
      $order=ManufactureOrder::where('id', $id)->first();
      $items=$order->items()->get();
      foreach($items as $item){
        $sid="STM".date('YmdHis').uniqid();
        $sm=new StockMove(array(
          'id'=>$sid,
          'reference_id'=>$id,
          'product_id'=>$item->material_id,
          'name'=>$item->name,
          'source'=>$order->warehouse,
          'destination'=>$order->factory,
          'quantity'=>$item->consumed_quantity,
          'type'=>'領料',
          'price'=>$item->price
        ));
        $sm->save();
      }
      return redirect('/product/orderdetail/'.$id)->with('status','您的物流異動已成功建立');
    }

    public function createJournal($id){
      $order=ManufactureOrder::where('id', $id)->first();
      $storages=$order->stockmoves()->get();
      $processes=$order->processes()->get();
      $sum_material=0;
      $sum_manufacture_cost=0;
      $sum_labor_cost=0;
      foreach($storages as $item){
        $rid="ACR".date('YmdHis').uniqid();
        $ledger=Ledger::where('dept', $item['product_id'])->first();
        $record=new AccountingRecord(array(
          'id'=>$rid,
          'batch_id'=>$id,
          'content'=>$ledger->name.'採購',
          'asset'=>'',
          'liability'=>$ledger->id,
          'amount'=>$item['quantity']*$item['price'],
        ));
        $record->save();
        $sum_material=$sum_material+$item['quantity']*$item['price'];
      }
      foreach($processes as $item){
        $sum_manufacture_cost=$sum_manufacture_cost+$item['manufacture_cost'];
        $sum_labor_cost=$sum_labor_cost+$item['labor_cost'];
      }
      $rid="ACR".date('YmdHis').uniqid();
      $ledger=Ledger::where('name', $order->dept.'製造費用')->first();
      $record=new AccountingRecord(array(
        'id'=>$rid,
        'batch_id'=>$id,
        'content'=>'製造費用',
        'asset'=>'',
        'liability'=>$ledger->id,
        'amount'=>$sum_manufacture_cost,
      ));
      $record->save();
      $rid="ACR".date('YmdHis').uniqid();
      $ledger=Ledger::where('name', $order->dept.'人力費用')->first();
      $record=new AccountingRecord(array(
        'id'=>$rid,
        'batch_id'=>$id,
        'content'=>'人力費用',
        'asset'=>'',
        'liability'=>$ledger->id,
        'amount'=>$sum_labor_cost,
      ));
      $record->save();
      $rid="ACR".date('YmdHis').uniqid();
      $ledger=Ledger::where('dept', $order->product_id)->first();
      $record=new AccountingRecord(array(
        'id'=>$rid,
        'batch_id'=>$id,
        'content'=>$ledger->name.'生產入庫',
        'asset'=>$ledger->id,
        'liability'=>'',
        'amount'=>($sum_labor_cost+$sum_manufacture_cost+$sum_material),
      ));
      $record->save();
      return redirect('/product/orderdetail/'.$id)->with('status','您的會計分錄已成功建立');
    }

    public function createmanufactureprocess($id){
      $order=ManufactureOrder::where('id', $id)->first();
      return view('product.createmanufactureprocess',compact('order'));
    }

    public function storemanufactureprocess(Request $request){
      $sid="MPR".date('YmdHis').uniqid();
      $mpr=new ManufactureProcess(array(
        'id'=>$sid,
        'order_id'=>$request->get('order_id'),
        'name'=>$request->get('name'),
        'manufacture_cost'=>$request->get('manufacture_cost'),
        'labor_cost'=>$request->get('labor_cost'),
      ));
      $mpr->save();
      return redirect('/product/orderdetail/'.$request->get('order_id'))->with('status','您的製程資料已成功建立');
    }

    public function manufacturePutin($id){
      $order=ManufactureOrder::where('id', $id)->first();
      $product=Product::where('id', $order->product_id)->first();
      $storages=$order->stockmoves()->get();
      $processes=$order->processes()->get();
      $sum_material=0;
      $sum_manufacture_cost=0;
      $sum_labor_cost=0;
      $sum_order=0;
      foreach($storages as $item){
        $sum_material=$sum_material+$item['quantity']*$item['price'];
      }
      foreach($processes as $item){
        $sum_manufacture_cost=$sum_manufacture_cost+$item['manufacture_cost'];
        $sum_labor_cost=$sum_labor_cost+$item['labor_cost'];
      }
      $sum_order=$sum_labor_cost+$sum_manufacture_cost+$sum_material;
      $sid="STM".date('YmdHis').uniqid();
      $sm=new StockMove(array(
        'id'=>$sid,
        'reference_id'=>$id,
        'product_id'=>$order->product_id,
        'name'=>$product->name,
        'source'=>$order->factory,
        'destination'=>$order->warehouse,
        'quantity'=>$order->quantity,
        'type'=>'入庫',
        'price'=>round($sum_order/$order->quantity,1)
      ));
      $sm->save();
      return redirect('/product/orderdetail/'.$id)->with('status','您的入庫資料已成功建立');
    }

    public function ordercostanalysis($id){
      $order=ManufactureOrder::where('id', $id)->first();
      $storages=$order->stockmoves()->get();
      $processes=$order->processes()->get();
      $sum_material=0;
      $sum_manufacture_cost=0;
      $sum_labor_cost=0;
      $sum_order=0;
      foreach($storages as $item){
        if($item->type=="領料")
        $sum_material=$sum_material+$item['quantity']*$item['price'];
      }
      foreach($processes as $item){
        $sum_manufacture_cost=$sum_manufacture_cost+$item['manufacture_cost'];
        $sum_labor_cost=$sum_labor_cost+$item['labor_cost'];
      }
      $sum_order=$sum_labor_cost+$sum_manufacture_cost+$sum_material;
      return view('product.ordercostanalysis',compact('order','sum_material','sum_manufacture_cost','sum_labor_cost'));
    }
}
