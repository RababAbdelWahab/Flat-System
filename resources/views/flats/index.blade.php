@extends('layouts.master')

@section('content')
    <h4>الشقق</h4> 
    <a href="{{ route('flats.create') }} " class="btn btn-success addBtn">اضافة</a></br>
    @if(count($flats) > 0)
    </br>   
    <table class="dataTable table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style= "width:10%">{{trans('#')}}</th>
                                    <th style= "width:10%">{{trans('رقم الشقة')}}</th>
                                    <th style= "width:10%">{{trans('اسم الساكن')}}</th>
                                    <th style= "width:10%">{{trans(' مجموع مستحقات الشقة الغير مدفوعة')}}</th>
                                    <th style= "width:10%">{{trans('العمليات')}}</th>
                                </tr>
                            </thead>
                            @forelse($flats as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->flatNumber }}</td>
                                <td>{{ $row->userName }}</td>
                                <td>{{ $flatsReceivables[ $row->id] }}</td>
                                <td>
 
         {!!Form::open(['action' => ['FlatController@destroy', $row->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('حذف', ['class' => 'btn btn-danger deleteBtn'])}}
        {!!Form::close()!!}
<a href="/abmAssessment/public/flats/{{$row->id}}/edit" class="btn btn-warning EditBtn">تعديل</a> 
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-info">{{trans('No data')}}</div>
                            @endforelse
                        </table>
                        @endif
@endsection


