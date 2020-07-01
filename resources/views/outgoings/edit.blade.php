@extends('layouts.master')

@section('content')
    <h4>مصروف تعديل </h4> 
    <form method="POST" action="{{ route('outgoings.update',$outgoings->id) }}" enctype="multipart/form-data"
                              class="col-md-offset-1 col-md-10 col-md-offset-1">
                              @csrf 
                              {{ method_field('PUT') }}
                              <div class="form-group">
                                <label class="labelFields" for="personName"> الشخص الذى قام بعملية الصرف *</label>
                                <input type="text" name="personName" value="{{$outgoings->personName}}" class="form-control" required data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="labelFields" for="value">قيمة المصروف *</label>
                                <input type="number" name="value" min="1"value="{{$outgoings->value}}" class="form-control" required data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="labelFields" for="date"> التاريخ *</label>
                                <input type="date" name="date" min="1"value="{{$outgoings->date}}" class="form-control" required data-validation="required"/>
                            </div>
                            <div class="form-group">
                            <label for="description" class="myLabel">وصف المستحق *</label>
                            <textarea name="description" class="form-control rounded-0" id="description" rows="3" required data-validation="required">{{$outgoings->description}}</textarea>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary center" value="تعديل" />
                            </div>
                        </form>
@endsection


