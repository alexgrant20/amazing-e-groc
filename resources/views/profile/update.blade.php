@extends('template.main')

@section('title', 'Register')

@section('container')
   <div class="container my-3">
      <div class="d-flex justify-content-center my-4 w-100">
         <h1 class="fw-bold fs-3">Profile</h1>
      </div>

      <div class="border border-2 rounded-3 mb-3 p-4">
         <form method="POST" action="{{ route('account.update') }}" class="px-4" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="row my-4">
               <div class="col-md-3 d-flex justify-content-center">
                     <img src="{{ asset($account->display_picture) }}" alt="" width="150px" height="200px">
               </div>

               <div class="col-md">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-3 row">
                           <label for="first_name" class="form-label">First Name</label>
                           <div>
                              <input type="text" name="first_name" id="first_name" class="form-control"
                                 value="{{ old('first_name', $account->first_name) }}">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group mb-3 row">
                           <label for="last_name" class="form-label">Last Name</label>
                           <div>
                              <input type="text" name="last_name" id="last_name" class="form-control"
                                 value="{{ old('last_name', $account->last_name) }}">
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-3 row">
                           <label for="gender" class="form-label">Gender</label>
                           <div>
                              <select name="gender" id="gender" aria-label="Default select example"
                                 class="form-select">
                                 <option value="" hidden></option>
                                 @foreach ($genders as $gender)
                                    <option value="{{ $gender->gender_id }}" @selected(old('gender', $account->gender_id) == $gender->gender_id)>
                                       {{ $gender->gender_desc }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group mb-3 row">
                           <label for="role" class="form-label">Role</label>
                           <div>
                              {{ $account->role->role_name }}
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="email" class="form-label">Email</label>
                           <div>
                              <input type="text" name="email" id="email" class="form-control"
                                 value="{{ old('email', $account->email) }}">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label class="form-label need-hint" for="display_picture">Display Picture</label>
                           <div class="custom-file">
                              <input type="file" class="form-control" id="display_picture" name="display_picture">
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="password" class="form-label">Password</label>
                           <div>
                              <input type="password" name="password" id="password" class="form-control">
                           </div>
                        </div>

                     </div>

                     <div class="col-md-6">
                        <div class="form-group mb-3">
                           <label for="password_confirmation" class="form-label">Confirm Password</label>
                           <div>
                              <input type="password" name="password_confirmation" id="password_confirmation"
                                 class="form-control">
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="form-group d-flex justify-content-center mt-5">
                     <button type="submit" class="btn btn-success px-4 py-2 fs-5">Save</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
@endsection
