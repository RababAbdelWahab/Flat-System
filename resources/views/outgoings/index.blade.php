@extends('layouts.master')

@section('content')
    <h4>المصروفات</h4> 
    <a href="{{ route('outgoings.create') }} " class="btn btn-success addBtn">اضافة</a></br>
    @if(count($outgoings) > 0)
    </br>   
    <table class="dataTable table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style= "width:10%">{{trans('#')}}</th>
                                    <th style= "width:10%">{{trans('اسم الشخص')}}</th>
                                    <th style= "width:10%">{{trans('قيمة المصروف')}}</th>
                                    <th style= "width:10%">{{trans('التاريخ ')}}</th>
                                    <th style= "width:10%">{{trans('وصف المصروف')}}</th>
                                    <th style= "width:10%">{{trans('العمليات')}}</th>
                                </tr>
                            </thead>
                            @forelse($outgoings as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->personName }}</td>
                                <td>{{ $row->value }}</td>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->description }}</td>
                                <td>
         {!!Form::open(['action' => ['OutgoingsController@destroy', $row->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('حذف', ['class' => 'btn btn-danger deleteBtn'])}}
        {!!Form::close()!!}
<a href="/abmAssessment/public/outgoings/{{$row->id}}/edit" class="btn btn-warning EditBtn">تعديل</a> 
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-info">{{trans('No data')}}</div>
                            @endforelse
                        </table>
                        @endif
@endsection


