@extends('template.main')

@section('title', 'Register')

@section('container')
   <div class="container my-3">
      <div class="border border-2 rounded-3 mb-3 p-4">
         <div class="d-flex justify-content-center my-4 w-100">
            <h1 class="fw-bold fs-3">{{ __('register') }}</h1>
         </div>

         <form method="POST" action="{{ route('create-account') }}" class="px-4" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group mb-3 row">
                     <label for="first_name" class="form-label required">{{ __('first_name') }}</label>
                     <div>
                        <input type="text" name="first_name" id="first_name" class="form-control"
                           value="{{ old('first_name') }}">
                     </div>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group mb-3 row">
                     <label for="last_name" class="form-label required">{{ __('last_name') }}</label>
                     <div>
                        <input type="text" name="last_name" id="last_name" class="form-control"
                           value="{{ old('last_name') }}">
                     </div>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-6">
                  <div class="form-group mb-3 row">
                     <label for="gender" class="form-label required">{{ __('gender') }}</label>
                     <div>
                        <select name="gender" id="gender" aria-label="Default select example" class="form-select">
                           <option value="" hidden></option>
                           @foreach ($genders as $gender)
                              <option value="{{ $gender->gender_id }}" @selected(old('gender') == $gender->gender_id)>{{ $gender->gender_desc }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group mb-3 row">
                     <label for="role" class="form-label required">{{ __('role') }}</label>
                     <div>
                        <select name="role" id="role" aria-label="Default select example" class="form-select">
                           <option value="" hidden></option>
                           @foreach ($roles as $role)
                              <option value="{{ $role->role_id }}" @selected(old('role') == $role->role_id)>{{ $role->role_name }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
            </div>

            <div class="form-group mb-3">
               <label for="email" class="form-label required">{{ __('email') }}</label>
               <div>
                  <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
               </div>
            </div>

            <div class="row">
               <div class="col-md-6">
                  <div class="form-group mb-3">
                     <label for="password" class="form-label required">{{ __('password') }}</label>
                     <div>
                        <input type="password" name="password" id="password" class="form-control">
                     </div>
                  </div>

               </div>

               <div class="col-md-6">
                  <div class="form-group mb-3">
                     <label for="password_confirmation" class="form-label required">{{ __('confirm_password') }}</label>
                     <div>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                     </div>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-6">
                  <div class="form-group mb-3">
                     <label class="required form-label need-hint" for="display_picture">{{ __('display_picture') }}</label>
                     <div class="custom-file">
                        <input type="file" class="form-control" id="display_picture" name="display_picture">
                     </div>
                  </div>
               </div>
            </div>

            <div class="form-group d-flex justify-content-center mt-5">
               <button type="submit" class="btn btn-success px-4 w-100 py-2 fs-5">{{ __('register') }}</button>
            </div>

            <div class="d-flex justify-content-center mt-3">
               <a href="{{ route('login') }}">{{ __('login_message') }}</a>
            </div>
         </form>
      </div>
   </div>
@endsection
