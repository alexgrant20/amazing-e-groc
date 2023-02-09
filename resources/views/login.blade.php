@extends('template.main')
@section('title', 'Login')

@section('container')
   <div class="d-flex align-items-center justify-content-center">
      <div class="container m-5 px-5">
         @if (session()->has('success'))
            <div class="alert alert-success alert-dismissable fade show" role="alert">
               {{ session('success') }}
               <button type="button" class="btn-close text-end" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         @endif

         @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissable fade show" role="alert">
               {{ session('loginError') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         @endif

         <div class="border border-2 rounded-3 mb-3 p-4">
            <div class="d-flex justify-content-center my-4 w-100">
               <h1 class="fw-bold fs-3">LOGIN</h1>
            </div>

            <form method="POST" action="{{ route('authenticate') }}" class="container px-5">
               @csrf
               <div class="form-group mb-3 row">
                  <label for="email" class="form-label required">Email</label>
                  <div>
                     <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                  </div>
               </div>

               <div class="form-group mb-3 row">
                  <label for="password" class="form-label required">Password</label>
                  <div>
                     <input type="password" name="password" id="password" class="form-control">
                  </div>
               </div>

               <div class="form-group d-flex justify-content-center mt-5">
                  <button type="submit" class="btn btn-success px-5 w-100 py-2 fs-5">Login</button>
               </div>

               <div class="d-flex justify-content-center w-100 mt-3">
                  <a href="{{ route('register') }}">Doesn't have an account? Click here to register</a>
               </div>
            </form>
         </div>
      </div>
   </div>

@endsection
