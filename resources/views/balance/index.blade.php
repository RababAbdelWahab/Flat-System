@extends('layouts.master')

@section('content')
    <h4> مجموع المستحقات المدفوعة :</h4> 
    <h4>{{ $flatsReceivablesSum}} جنيه </h4><br><br>
    <h4>مجموع المصروفات :</h4> 
    <h4>{{$outgoings}} جنيه </h4> <br><br>
    <h4>  الرصيد الحالى للعمارة :</h4> 
    <h4>  مجموع المستحقات - مجموع المصروفات =     {{ $flatsReceivablesSum -  $outgoings}} جنيه</h4> 

    
@endsection


