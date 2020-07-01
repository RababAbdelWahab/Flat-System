@extends('layouts.master')

@section('content')
    <h4>  عرض المصروفات فى فترة معينة</h4> 
   
     <table class="dataTable table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th style= "width:10%">الشخص الذى قام بعملية الصرف</th>
                                <th style= "width:10%">التاريخ</th>   
                                <th style= "width:10%">القيمة</th> 
                                <th style= "width:10%">الوصف</th>                             
                                </tr>
                            </thead>
                            @foreach ($outgoings as $row)
                                    <tr> 
                                    <td>{{ $row['personName'] }}</td>    
                                    <td>{{ $row['date'] }}</td> 
                                    <td>{{ $row['value'] }}</td> 
                                    <td>{{ $row['description'] }}</td> 
                                   </tr>
                                   @endforeach 

                                    </table>
@endsection


