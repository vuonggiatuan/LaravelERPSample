<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Department;
use App\Ledger;
use App\LedgerBudget;

class AccountingLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function deptlist(){
      $depts=Department::all();
      return view('ledger.deptlist',compact('depts'));
    }

    public function ledgerlist(){
      $ledgers=Ledger::all();
      return view('ledger.ledgerlist',compact('ledgers'));
    }

    public function budgetlist(){
      $budgets=LedgerBudget::all();
      return view('ledger.budgetlist',compact('budgets'));
    }

    public function createbudget(){
      
      return view('ledger.createbudget');
    }

    public function storebudget(Request $request){
      $id="LBG".date('Ymd').uniqid();
      $budget=new LedgerBudget(array(
        'id'=>$id,
        'ledger_id'=>$request->get('ledger_id'),
        'year'=>$request->get('year'),
        'budget'=>$request->get('budget'),
      ));
      $budget->save();
      return redirect('/accountingledger/budgetlist')->with('status','預算已成功建立');
    }
}
