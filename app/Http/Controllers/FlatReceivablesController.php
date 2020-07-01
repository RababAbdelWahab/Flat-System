<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flatreceivables;
use App\Flat;
use App\Receivable;

class FlatReceivablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $collection3 = Flatreceivables::get(['receivableId' , 'id','flatId']);
        $flatsReceivables=[];
        foreach ($collection3 as $item3) {
        $flatsReceivablesIn=[];
        $flatsReceivablesIn['receivableId'] = $item3->receivableId;
        $flatsReceivablesIn['id']  = $item3->id;
        $flatsReceivablesIn['flatId']  = $item3->flatId;

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
        return view('flatsReceivables.index', compact('receivablesNames', 'flatsNumbers','flatsReceivables'));
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
        return view ('flatsReceivables.create',compact('flats','receivables' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
                    $flats  = Flat::all();
                    if( $request->input('flatId')=="0"){
                        for($i=0;$i < count($flats);$i++){
                            $flatReceivable = Flatreceivables::where('receivableId', '=', $request->input('receivableId')
                            )->where('flatId','=',$flats[$i]->id)->first();
                            if(is_null($flatReceivable)||empty($flatReceivable)){
                             $flatReceivable  =new Flatreceivables;
                            $flatReceivable->flatId =$flats[$i]->id;
                            $flatReceivable->receivableId = $request->input('receivableId');
                            $flatReceivable->isPaid =0;
                            $flatReceivable->save();           
                        }
                    }
                    }else{
                        $flatReceivable = Flatreceivables::where('receivableId', '=', $request->input('receivableId')
                        )->where('flatId','=',$request->input('flatId'))->first();
                        if(is_null($flatReceivable)||empty($flatReceivable)){
                        $flatReceivable  =new Flatreceivables;
                        $flatReceivable->isPaid =0;
                        $flatReceivable->flatId =$request->input('flatId');
                    $flatReceivable->receivableId = $request->input('receivableId');
                    $flatReceivable->save();    
                    }   
                }
         return redirect('/flatsreceivables') ;
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
        return view('flatsReceivables.edit',compact('flats','receivables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
//    public function getFlatReceivables(Request $request){
//     $data = [];
//     $data['status'] = 'fail';
//     $data['msg'] = __('Fail');

//     return response()->json($data);

//     $totalflatReceivables=[];
//     if (isset($request->flatId)) {
//         $flatId = $request->flatId;
//     }
//             $flatReceivables = Flatreceivables::where('flatId',  $flatId)->get();
//             foreach($flatReceivables as $flatReceivable){
//                 $receivableId=$flatReceivable->receivableId;
//                 $receivable = Receivable::where('id',  $receivableId)->first();
//                 $totalflatReceivables[]=$receivable;
//             }
//             $data['status'] = 'success';
//             $data['msg'] = __('Success');
//             if ($totalflatReceivables) {
//                 $data['list'] = $totalflatReceivables;
//             } else {
//                 $data['list'] = [];
//             }
//         return response()->json($data);
//     }
   
     public function update(Request $request, $id)
    {
        $flatReceivable = Flatreceivables::where('receivableId', '=', $request->input('receivableId')
        )->where('flatId','=',$request->input('flatId'))->first();
        if(is_null($flatReceivable)||empty($flatReceivable)){
            return redirect('/flatsreceivables/1/edit')->withErrors([  'هذا المستحق غير موجود لهذه الشقة']);                   
}
else {       
    $flatReceivable->delete();
    return redirect('/flatsreceivables');
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
    }
    
    
}
