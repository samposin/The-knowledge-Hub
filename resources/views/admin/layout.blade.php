<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Pace</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/fontawesome-free/css/all.min.css') !!}">
  <!-- pace-progress -->
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/pace-progress/themes/black/pace-theme-flat-top.css') !!}">
  <!-- adminlte-->
  <link rel="stylesheet" href="{!! asset('public/admin-theme/dist/css/adminlte.min.css') !!}">
  @stack('style')
</head>
<body class="hold-transition sidebar-mini pace-primary">
<!-- Site wrapper -->
<div class="wrapper">

    @include('admin.theme.header')
    @include('admin.theme.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{!! asset('public/admin-theme/plugins/jquery/jquery.min.js') !!}"></script>
<!-- Bootstrap 4 -->
<script src="{!! asset('public/admin-theme/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
  <!-- pace-progress -->
<script src="{!! asset('public/admin-theme/plugins/pace-progress/pace.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('public/admin-theme/dist/js/adminlte.min.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{!! asset('public/admin-theme/dist/js/demo.js') !!}"></script> --}}
@stack('script')
</body>
</html>
