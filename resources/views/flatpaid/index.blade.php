@extends('layouts.master')

@section('content')
    <h4>مدفوعات الشقق</h4>  
    <a href="{{ route('flatpaid.create') }} "  style="margin-left:20px;"  class="btn btn-success flatsReceivableBtn">اضافة مدفوعات للشقق</a> 
    <a href="/abmAssessment/public/flatpaid/1/edit" class="btn btn-success  flatsReceivableBtn">حذف دفع الشقق</a></br>
 <br> <form method="POST" action="{{ route('flatsreceivables.store') }}" enctype="multipart/form-data"
                              class="col-md-offset-1 col-md-10 col-md-offset-1">
                              @csrf 
                     <table class="dataTable table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th style= "width:10%">#</th>
                                @if (count($receivablesNames) > 0)
                                    @foreach ($receivablesNames as $row)
                                    <th style= "width:10%">{{ $row['receivableName'] }}</th>
                                    @endforeach
                                @endif
                                </tr>
                            </thead>
                                    @foreach ($flatsNumbers as $row2)
                                    <tr> 
                                    <td>{{ ($row2 ['flatNumber'] ) }}</td>    
                                     @foreach ($receivablesNames as $row3)
                               <td>

                                <input type="checkbox" disabled readonly name="jj" value="hh"  
                                @foreach($flatsReceivables as $row4)
                                @if(($row2['id'] == $row4['flatId']) && ($row3['id'] == $row4['receivableId']) && ($row4['isPaid'] == 1))   checked=checked  @endif
                                @endforeach>  
                                                                  
                                </td> 
                                   @endforeach 
                                   </tr>
                                    @endforeach 
                                    </table>
                                    
                            </form>

 @endsection


