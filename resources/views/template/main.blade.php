<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body class="min-vh-100 pb-5 position-relative">
   @include('layout.header')

   <div class="container-fluid p-5">
      @yield('container')
   </div>

   @include('layout.footer')

   @include('layout.foot')

   @yield('js-foot');
</body>

</html>
