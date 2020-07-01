<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outgoings;


class OutgoingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $outgoings = Outgoings::all();
        return view ('outgoings.index')->with('outgoings', $outgoings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('outgoings.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $outgoings =new Outgoings;
        $outgoings->personName =$request->input('personName');
        $outgoings->date =$request->input('date');
        $outgoings->value =$request->input('value');
        $outgoings->description =$request->input('description');
        $outgoings->save();
        return redirect('/outgoings') ;
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
        $outgoings = Outgoings::find($id);
        return view('outgoings.edit')->with('outgoings',$outgoings);
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
        $outgoings =Outgoings::find($id);
        $outgoings->personName =$request->input('personName');
        $outgoings->date =$request->input('date');
        $outgoings->value =$request->input('value');
        $outgoings->description =$request->input('description');
        $outgoings->save();
        return redirect('/outgoings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outgoings =Outgoings::find($id);
        $outgoings->delete();
        return redirect('/outgoings');
    }
}
