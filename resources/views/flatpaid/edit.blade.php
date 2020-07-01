@extends('layouts.master')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
<p>{{$errors->first()}}</p>
</div>
@endif
    <h4>حذف دفع لشقة </h4> 
    
    <form method="POST" action="{{ route('flatpaid.destroy',1) }}" enctype="multipart/form-data"
                              class="col-md-offset-1 col-md-10 col-md-offset-1">
                              @csrf 
                              {{ method_field('PUT') }}
                              <div class="form-group">
                                <label class="labelFields" for="flatId"> رقم الشقة المراد حذف الدفع لها *</label>
                                <select class="browser-default custom-select" id="flatSelect" name="flatId" >
                               @if(count($flats) >0)
                                @foreach($flats as $flat)
                                <option value="{{ $flat->id}}">{{ $flat->flatNumber}}</option>
                                @endforeach
@endif
                                </select>            
                                            </div>
                                            <div class="form-group">
                                <label class="labelFields" for="receivableId"> اسم المستحق المراد تطبيقه  *</label>
                                <select class="browser-default custom-select" name="receivableId">
                                @if(count($receivables) >0)
                                @foreach($receivables as $receivable)
                                <option value="{{ $receivable->id}}">{{ $receivable->receivableName}}</option>
                                @endforeach
@endif
                                </select>                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary center" value="حذف" />
                            </div>
                        </form>
@endsection