<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountingRecordFormRequest;

use App\AccountingRecord;

class AccountingRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=AccountingRecord::all();

        return view('accountingrecord.index',compact('records'));
    }

    public function newreceipt(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function submit()
    {
        return view('accountingrecord.submit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountingRecordFormRequest $request)
    {
        $id="ACR".date('Ymd').uniqid();
        $record=new AccountingRecord(array(
          'id'=>$id,
          'content'=>$request->get('content'),
          'asset'=>$request->get('asset'),
          'liability'=>$request->get('liability'),
        ));
        $record->save();
        return redirect('/accountingrecord/submit')->with('status','Your record has been created');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $record=AccountingRecord::where('id', $id)->first();
        return view('accountingrecord.detail',compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
