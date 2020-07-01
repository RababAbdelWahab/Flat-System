@extends('layouts.master')

@section('content')
    <h4>شقة تعديل </h4> 
    <form method="POST" action="{{ route('flats.update',$flat->id) }}" enctype="multipart/form-data"
                              class="col-md-offset-1 col-md-10 col-md-offset-1">
                              @csrf 
                              {{ method_field('PUT') }}

                                <div class="form-group">
                                <label class="labelFields" for="userName">اسم الساكن *</label>
                                <input type="text" name="userName" value="{{$flat->userName}}" class="form-control" required data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="labelFields" for="flatNumber">رقم الشقة *</label>
                                <input type="number" name="flatNumber" value="{{$flat->flatNumber}}" min="1" class="form-control" required data-validation="required"/>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary center" value="تعديل" />
                            </div>
                        </form>
@endsection


