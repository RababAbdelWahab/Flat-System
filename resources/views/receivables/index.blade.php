@extends('layouts.master')

@section('content')
    <h4>المستحقات</h4> 
    <a href="{{ route('receivables.create') }} " class="btn btn-success addBtn">اضافة</a></br>
    @if(count($receivables) > 0)
    </br>   
    <table class="dataTable table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style= "width:10%">{{trans('#')}}</th>
                                    <th style= "width:10%">{{trans('اسم المستحق')}}</th>
                                    <th style= "width:10%">{{trans('قيمة المستحق')}}</th>
                                    <th style= "width:10%">{{trans('نوع المستحق')}}</th>
                                    <th style= "width:10%">{{trans('وصف المستحق')}}</th>
                                    <th style= "width:10%">{{trans('العمليات')}}</th>
                                </tr>
                            </thead>
                            @forelse($receivables as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->receivableName }}</td>
                                <td>{{ $row->value }}</td>
                                <td> {{($row->type ==='monthly') ? 'شهرى' : 'طارئ'}}</td>
                                <td>{{ $row->description }}</td>
                                <td>
         {!!Form::open(['action' => ['ReceivableController@destroy', $row->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('حذف', ['class' => 'btn btn-danger deleteBtn'])}}
        {!!Form::close()!!}
<a href="/abmAssessment/public/receivables/{{$row->id}}/edit" class="btn btn-warning EditBtn">تعديل</a> 
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-info">{{trans('No data')}}</div>
                            @endforelse
                        </table>
                        @endif
@endsection


