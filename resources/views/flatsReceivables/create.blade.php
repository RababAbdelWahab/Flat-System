@extends('layouts.master')

@section('content')
    <h4>اضافة مستحق للشقق</h4> 
    <form method="POST" action="{{ route('flatsreceivables.store') }}" enctype="multipart/form-data"
                              class="col-md-offset-1 col-md-10 col-md-offset-1">
                              @csrf 
                                <div class="form-group">
                                <label class="labelFields" for="flatId"> رقم الشقة المراد اضافة مستحق لها *</label>
                                <select class="browser-default custom-select" name="flatId">
                               @if(count($flats) >0)
                               <option value="0">كل الشقق</option>
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
                                <input type="submit" class="btn btn-primary center" value="اضافة" />
                            </div>
                        </form>
@endsection


