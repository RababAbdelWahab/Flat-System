<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FlatController;
use App\Outgoings;
use App\Flat;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outgoings = Outgoings::sum('value');
        $flatController = new FlatController();
        $flatsIds = Flat::pluck('id');
        $flatsReceivablesTemp=$flatController->getFlatsReceivables($flatsIds,1);
        $flatsReceivables=[];  
        if($flatsReceivablesTemp['status']=='success'){
            $flatsReceivables=$flatsReceivablesTemp['list'];
        }
        $flatsReceivablesSum=0;
        foreach($flatsReceivables as $key=> $value){
            $flatsReceivablesSum=   $flatsReceivablesSum+$value;
        }
        return view ('balance.index',compact('outgoings','flatsReceivablesSum'));

    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
