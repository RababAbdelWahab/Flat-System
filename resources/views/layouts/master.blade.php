<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
  <!-- Custom styles -->
  <link href="{{ asset('css/app-style.css') }}" rel="stylesheet">
    <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  </head>

  <body dir="rtl">
  <div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">القائمة </div>
  <div class="list-group list-group-flush">
    <a href="{{ route('flats.index') }}" class="list-group-item list-group-item-action bg-light">الشقق</a>
    <a href="{{ route('receivables.index') }}" class="list-group-item list-group-item-action bg-light">المستحقات</a>
    <a href="{{ route('flatsreceivables.index') }}" class="list-group-item list-group-item-action bg-light">مستحقات الشقق</a>
    <a href="{{ route('outgoings.index') }}"  class="list-group-item list-group-item-action bg-light">المصروفات</a>
    <a href="{{ route('flatpaid.index') }}"  class="list-group-item list-group-item-action bg-light">متابعة سداد الدفعات</a>

  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <button onclick="window.location.href = '{{ route("reports.index") }}';" class="btn btn-primary reportBtn" id="menu-toggle">تقرير رصيد العمارة</button> 
  <button onclick="window.location.href = '{{ route("expensereport.index") }}';" class="btn btn-primary reportBtn" id="menu-toggle">تقرير المصروفات </button> 
  <button onclick="window.location.href = '{{ route("flats.index") }}';" class="btn btn-primary reportBtn" id="menu-toggle">تقرير مستحقات الشقق</button> 

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    </div>
  </nav>

  <div class="container-fluid">
    @yield('content') 
  </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->          

<!-- Bootstrap 4 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</body>
</html>
