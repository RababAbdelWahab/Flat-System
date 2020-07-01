@extends('layouts.master')

@section('content')
    <h4>اضافة مستحق</h4> 
    <form method="POST" action="{{ route('receivables.store') }}" enctype="multipart/form-data"
                              class="col-md-offset-1 col-md-10 col-md-offset-1">
                              @csrf 
                                <div class="form-group">
                                <label class="labelFields" for="receivableName">اسم المستحق *</label>
                                <input type="text" name="receivableName"  class="form-control" required data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="labelFields" for="value">قيمة المستحق *</label>
                                <input type="number" name="value" min="1" class="form-control" required data-validation="required"/>
                            </div>
                            <div class="form-group">
                            <label for="type" class="myLabel">نوع المستحق *</label>
                                <select class="browser-default custom-select" name="type">
                                <option value="monthly">شهرى</option>
                                <option value="emergency">طارئ</option> 
                                </select>
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


