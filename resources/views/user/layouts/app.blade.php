<!DOCTYPE html>
<html lang="en">

  <head>
    @include('user.layouts.head')
    @section('head')
      @show
  </head>

  <body>

    <!-- Navigation -->
    @include('user.layouts.nav')

    @section('header')
      @show

    @section('container')
      @show

    <!-- Footer -->
    @include('user.layouts.footer')

    @include('user.layouts.script')
    @section('script')
      @show

    
  </body>

</html>
