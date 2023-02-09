@extends('template.main')

@section('title', 'TEST')

@section('container')
   <div class="d-flex rounded-circle fs-5 border-dark border align-items-center justify-content-center mx-auto my-4"
      style="width: 500px; height: 500px;">
      {{ __('lang.welcome') }}
   </div>
@endsection
