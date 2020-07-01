@extends('layouts.master')

@section('content')
    <h4> عرض المصروفات</h4> 
    <form method="post" action="{{ route('expensereport.store') }}" enctype="multipart/form-data"
                              class="col-md-offset-1 col-md-10 col-md-offset-1">
                              @csrf 
                                               
                           
                            <div class="form-group">
                                <label class="labelFields" for="expenseFrom">عرض المصروفات من تاريخ: *</label>
                                <input type="date" name="expenseFrom" min="1" class="form-control" required data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="labelFields" for="expenseTo">عرض المصروفات الى تاريخ *</label>
                                <input type="date" name="expenseTo" min="1" class="form-control" required data-validation="required"/>
                            </div>
                           
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary center" value="عرض" />
                            </div>
                        </form>
@endsection


