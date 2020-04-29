<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AccountingEntry;
use App\AccountingRecord;

class AccountingEntryController extends Controller
{
    public function index(){
      $entrys=AccountingEntry::all();

      return view('accountingentry.index',compact('entrys'));
    }

    public function create(){
      return view('accountingentry.create');
    }

    public function store(Request $request){
      $id="ACE".date('Ymd').uniqid();
      $entry=new AccountingEntry(array(
        'id'=>$id,
        'reference_id'=>$request->get('reference_id'),
        'dept'=>$request->get('dept'),
        'purpose'=>$request->get('purpose'),
        'remark'=>$request->get('remark'),
      ));
      $entry->save();
      $records=json_decode($request->get('it_post'), true);
      
      foreach($records as $record){
        print($id);
        $rid="ACR".date('YmdHis').uniqid();
        $record=new AccountingRecord(array(
          'id'=>$rid,
          'batch_id'=>$id,
          'content'=>$record['content'],
          'asset'=>$record['asset'],
          'liability'=>$record['liability'],
          'amount'=>$record['amount'],
        ));
        $record->save();
      }
      return redirect('/accountingentry/create')->with('status','您的會計分錄已成功建立');
    }

    public function detail($id){
      $entry=AccountingEntry::where('id', $id)->first();
      $records=$entry->records()->get();
      return view('accountingentry.detail',compact('entry','records'));
    }
}
