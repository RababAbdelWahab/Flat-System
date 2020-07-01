<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receivable;

class ReceivableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receivables = Receivable::all();
        return view ('receivables.index')->with('receivables', $receivables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('receivables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $receivable =new Receivable;
        $receivable->receivableName =$request->input('receivableName');
        $receivable->type =$request->input('type');
        $receivable->value =$request->input('value');
        $receivable->description =$request->input('description');
        $receivable->save();
        return redirect('/receivables') ;
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
        $receivable = Receivable::find($id);
        return view('receivables.edit')->with('receivable',$receivable);
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
        
        $receivable =Receivable::find($id);
        $receivable->receivableName =$request->input('receivableName');
        $receivable->type =$request->input('type');
        $receivable->value =$request->input('value');
        $receivable->description =$request->input('description');
        $receivable->save();
        return redirect('/receivables');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receivable =Receivable::find($id);
        $receivable->delete();
        return redirect('/receivables');
    }
}
