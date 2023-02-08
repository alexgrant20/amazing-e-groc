<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body class="min-vh-100 pb-5">
   @include('layout.header')

   @yield('container')

   @include('layout.footer')

   @include('layout.foot')
</body>

</html>
