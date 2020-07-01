<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flatreceivables;
use App\Flat;
use App\Receivable;

class FlatpaidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection3 = Flatreceivables::get(['receivableId' , 'id','flatId','isPaid']);
        $flatsReceivables=[];
        foreach ($collection3 as $item3) {
        $flatsReceivablesIn=[];
        $flatsReceivablesIn['receivableId'] = $item3->receivableId;
        $flatsReceivablesIn['id']  = $item3->id;
        $flatsReceivablesIn['flatId']  = $item3->flatId;
        $flatsReceivablesIn['isPaid']  = $item3->isPaid;

        $flatsReceivables[]=   $flatsReceivablesIn;
        }


        $collection2 = Receivable::get(['receivableName' , 'id']);
        $receivablesNames=[];
        foreach ($collection2 as $item2) {
        $receivablesNamesIn=[];
        $receivablesNamesIn['id'] = $item2->id;
        $receivablesNamesIn['receivableName']  = $item2->receivableName;
        $receivablesNames[]=   $receivablesNamesIn;
        }

        $collection = Flat::get(['flatNumber' , 'id']);
        $flatsNumbers=[];
        foreach ($collection as $item) {
        $flatsIn=[];
        $flatsIn['id'] = $item->id;
        $flatsIn['flatNumber']  = $item->flatNumber;
        $flatsNumbers[]=   $flatsIn;
}
        return view('flatpaid.index', compact('receivablesNames', 'flatsNumbers','flatsReceivables'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flats  = Flat::all();
        $receivables = Receivable::all();
        return view ('flatpaid.create',compact('flats','receivables' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flatReceivable = Flatreceivables::where('receivableId', '=', $request->input('receivableId')
        )->where('flatId','=',$request->input('flatId'))->first();
        if(is_null($flatReceivable)||empty($flatReceivable)){
            return redirect('/flatpaid/1/edit')->withErrors([  'هذا المستحق غير موجود لهذه الشقة']);                   
}
else {       
    $flatReceivable->isPaid=1;
    $flatReceivable->save();

    return redirect('/flatpaid');
}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flats  = Flat::all();
        $receivables = Receivable::all();
        return view('flatpaid.edit',compact('flats','receivables'));
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
        $flatReceivable = Flatreceivables::where('receivableId', '=', $request->input('receivableId')
        )->where('flatId','=',$request->input('flatId'))->first();
        if(is_null($flatReceivable)||empty($flatReceivable)){
            return redirect('/flatpaid/1/edit')->withErrors([  'هذا المستحق غير موجود لهذه الشقة']);                   
}
else {       
    $flatReceivable->isPaid=0;
    $flatReceivable->save();

    return redirect('/flatpaid');
}
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
