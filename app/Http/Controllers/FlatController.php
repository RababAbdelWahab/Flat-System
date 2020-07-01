<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flat;
use App\Flatreceivables;
use App\Receivable;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flats = Flat::all();
        $flatsIds = Flat::pluck('id');
        $flatsReceivablesTemp=$this->getFlatsReceivables($flatsIds,0);
        $flatsReceivables=[];  
        if($flatsReceivablesTemp['status']=='success'){
            $flatsReceivables=$flatsReceivablesTemp['list'];
        }
        return view ('flats.index',compact('flats','flatsReceivables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('flats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flat =new Flat;
        $flat->userName =$request->input('userName');
        $flat->flatNumber =$request->input('flatNumber');
        $flat->save();
        return redirect('/flats') ;
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
        $flat = Flat::find($id);

        return view('flats.edit')->with('flat',$flat);
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
        
        $flat =Flat::find($id);
        $flat->userName =$request->input('userName');
        $flat->flatNumber =$request->input('flatNumber');
        $flat->save();
        return redirect('/flats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flat =Flat::find($id);
        $flat->delete();
        return redirect('/flats');
    }

    public function getFlatsReceivables($flatsIds,$paid) {
        $data = [];
        $data['status'] = 'fail';
        $data['msg'] = __('Fail');
        if (isset($flatsIds)) {
            $flatsReceivableValues=[];
            foreach($flatsIds as $flatId){
                $flatReceivables = Flatreceivables::where('flatId',  $flatId)->where('isPaid',$paid)->get();
                $flatReceivableValues=0;
                foreach($flatReceivables as $flatReceivable){
                    $receivableId=$flatReceivable->receivableId;
                    $receivable = Receivable::where('id',  $receivableId)->first();
                    $receivableValue=(int) $receivable->value;
                    $flatReceivableValues=$flatReceivableValues+ $receivableValue;
                }
                $flatsReceivableValues[$flatId] =$flatReceivableValues;
            }
                $data['status'] = 'success';
                $data['msg'] = __('Success');
                if ($flatsReceivableValues) {
                    $data['list'] = $flatsReceivableValues;
                } else {
                    $data['list'] = [];
                }
            
        }  
        return $data;
    }


//     public function getFlatReceivables(Request $request) {
// dd($request);
//         $data = [];
//         $data['status'] = 'fail';
//         $data['msg'] = __('Fail');
//         $totalflatReceivables=[];
//         if (isset($request->flatId)) {
//             $flatId = $request->flatId;
//         }
//                 $flatReceivables = Flatreceivables::where('flatId',  $flatId)->get();
//                 foreach($flatReceivables as $flatReceivable){
//                     $receivableId=$flatReceivable->receivableId;
//                     $receivable = Receivable::where('id',  $receivableId)->first();
//                     $totalflatReceivables[]=$receivable;
//                 }
//                 $data['status'] = 'success';
//                 $data['msg'] = __('Success');
//                 if ($totalflatReceivables) {
//                     $data['list'] = $totalflatReceivables;
//                 } else {
//                     $data['list'] = [];
//                 }
//             return $data;
//     }
}
