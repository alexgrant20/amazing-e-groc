@extends('template.main')
@section('title', 'Update Role')

@section('container')
   <div class="container my-3">
      <div class="d-flex justify-content-center my-4 w-100">
         <h1 class="fw-bold fs-3">Update Role</h1>
      </div>

      <div class="border border-2 rounded-3 mb-3 p-4">
         <form method="POST" action="{{ route('account.update-role', $user->account_id) }}" class="px-4">
            @method('patch')
            @csrf
            <div class="row my-4">
               <div class="col-md-3">Nama: </div>
               <div class="col-md">{{ $user->first_name . ' ' . $user->last_name }}</div>
            </div>

            <div class="row my-4">
               <label for="role" class="form-label col-md-3">Role</label>
               <div class="col-md">
                  <select name="role" id="role" aria-label="Default select example" class="form-select">
                     <option value="" hidden></option>
                     @foreach ($roles as $role)
                        <option value="{{ $role->role_id }}" @selected(old('role') == $role->role_id)>{{ $role->role_name }}
                        </option>
                     @endforeach
                  </select>
               </div>
            </div>

            <div class="form-group d-flex justify-content-center mt-5">
               <button type="submit" class="btn btn-success px-4 py-2 fs-5">Save</button>
            </div>
         </form>
      </div>
   </div>
@endsection
