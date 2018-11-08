<!DOCTYPE html>
<html>
<head>
    @include('admin.layouts.head')
    @section('head')
      @show
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('admin.layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @section('content-header')
    @show

    <!-- Main content -->
    @section('content')
    @show
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')

  <!-- Control Sidebar -->
  @include('admin.layouts.setting')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

  @include('admin.layouts.script')
  @section('script')
    @show
</body>
</html>
