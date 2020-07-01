@extends('layouts.master')

@section('content')
    <h4>اضافه مصروف</h4> 
    <form method="POST" action="{{ route('outgoings.store') }}" enctype="multipart/form-data"
                              class="col-md-offset-1 col-md-10 col-md-offset-1">
                              @csrf 
                                <div class="form-group">
                                <label class="labelFields" for="personName">الشخص الذى قام بعملية الصرف *</label>
                                <input type="text" name="personName"  class="form-control" required data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="labelFields" for="value">قيمه المصروف *</label>
                                <input type="number" name="value" min="1" class="form-control" required data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="labelFields" for="date">التاريخ *</label>
                                <input type="date" name="date" min="1" class="form-control" required data-validation="required"/>
                            </div>
                            <div class="form-group">
                            <label for="description" class="myLabel">وصف المستحق *</label>
                            <textarea name="description" class="form-control rounded-0" id="description" rows="3" required data-validation="required"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary center" value="اضافة" />
                            </div>
                        </form>
@endsection


