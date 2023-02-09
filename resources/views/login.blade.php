@extends('template.main')
@section('title', 'Login')

@section('container')
   <div class="d-flex align-items-center justify-content-center">
      <div class="container m-5 px-5">
         <div class="border border-2 rounded-3 mb-3 p-4">
            <div class="d-flex justify-content-center my-4 w-100">
               <h1 class="fw-bold fs-3">{{ __('lang.login') }}</h1>
            </div>

            <form method="POST" action="{{ route('authenticate') }}" class="container px-5">
               @csrf
               <div class="form-group mb-3 row">
                  <label for="email" class="form-label">{{ __('lang.email') }}</label>
                  <div>
                     <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                  </div>
               </div>

               <div class="form-group mb-3 row">
                  <label for="password" class="form-label">{{ __('lang.password') }}</label>
                  <div>
                     <input type="password" name="password" id="password" class="form-control">
                  </div>
               </div>

               <div class="form-group d-flex justify-content-center mt-5">
                  <button type="submit" class="btn btn-success px-5 w-100 py-2 fs-5">{{ __('lang.login') }}</button>
               </div>

               <div class="d-flex justify-content-center w-100 mt-3">
                  <a href="{{ route('register') }}">{{ __('lang.register_message') }}</a>
               </div>
            </form>
         </div>
      </div>
   </div>

@endsection
