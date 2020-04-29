<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Product;

class BIController extends Controller
{
    public function sale(){
      return view('bi.sale');
    }

    public function accounting(){
      return view('bi.accounting');
    }

    public function product(){
      $products=Product::all();
      $purchase=DB::select( DB::raw("SELECT product_id,product.name as product_name,quantity,SUM(quantity*price) as sum FROM erp.stock_move JOIN erp.product ON stock_move.product_id LIKE product.id WHERE type LIKE '%採購入庫%'GROUP BY product_id;"));
      $production=DB::select( DB::raw("SELECT product_id,product.name as product_name,quantity,SUM(quantity*price) as sum FROM erp.stock_move JOIN erp.product ON stock_move.product_id LIKE product.id WHERE type LIKE '%生產入庫%'GROUP BY product_id;"));
      $sale=DB::select( DB::raw("SELECT product_id,product.name as product_name,quantity,SUM(quantity*price) as sum FROM erp.stock_move JOIN erp.product ON stock_move.product_id LIKE product.id WHERE type LIKE '%銷貨出庫%'GROUP BY product_id;"));
      return view('bi.product',compact('products','purchase','production','sale'));
    }

    public function productdetail($id){
      $product=Product::where('id', $id)->first();
      $purchase= DB::select( DB::raw("SELECT year(updated_at) as year,month(updated_at) as month,SUM(quantity) as quantity,price FROM erp.stock_move WHERE product_id LIKE '".$id."' AND type LIKE '%採購%' GROUP BY year(updated_at),month(updated_at) ORDER BY updated_at;"));
      $production= DB::select( DB::raw("SELECT year(updated_at) as year,month(updated_at) as month,SUM(quantity) as quantity,price FROM erp.stock_move WHERE product_id LIKE '".$id."' AND type LIKE '%生產入庫%' GROUP BY year(updated_at),month(updated_at) ORDER BY updated_at;"));
      $sale= DB::select( DB::raw("SELECT year(updated_at) as year,month(updated_at) as month,SUM(quantity) as quantity,price FROM erp.stock_move WHERE product_id LIKE '".$id."' AND type LIKE '%銷貨出庫%' GROUP BY year(updated_at),month(updated_at) ORDER BY updated_at;"));
      return view('bi.detailproduct',compact('product','purchase','production','sale'));
    }

    public function manufacture(){
      $manufacture_cost= DB::select( DB::raw("SELECT year(updated_at) as year,month(updated_at) as month,SUM(amount) as sum FROM erp.accounting_record WHERE liability LIKE '%510104%' GROUP BY year(updated_at),month(updated_at) ORDER BY updated_at;") );
      $labor_cost=DB::select( DB::raw("SELECT year(updated_at) as year,month(updated_at) as month,SUM(amount) as sum FROM erp.accounting_record WHERE liability LIKE '%510103%' GROUP BY year(updated_at),month(updated_at) ORDER BY updated_at;") );
      $material_cost=DB::select( DB::raw("SELECT year(updated_at) as year,month(updated_at) as month,SUM(amount) as sum FROM erp.accounting_record WHERE liability LIKE '%5600%' AND content LIKE '%領料%' GROUP BY year(updated_at),month(updated_at) ORDER BY updated_at") );
      $production_cost=DB::select( DB::raw("SELECT year(updated_at) as year,month(updated_at) as month,SUM(amount) as sum FROM erp.accounting_record WHERE asset LIKE '%5600%' AND content LIKE '%生產入庫%' GROUP BY year(updated_at),month(updated_at) ORDER BY updated_at") );
      $production_budget=DB::select( DB::raw("SELECT * FROM erp.general_ledger_budget WHERE ledger_id LIKE '510%';") );
      return view('bi.manufacture',compact('manufacture_cost','labor_cost','material_cost','production_cost','production_budget'));
    }

    public function purchase(){
      return view('bi.purchase');
    }

    public function storage(){
      return view('bi.storage');
    }
}
