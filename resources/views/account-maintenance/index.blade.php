@extends('template.main')
@section('title', 'Account Maintenance')

@section('container')
   <div class="container my-3 w-50">
      <div class="row">
         <div class="col-md-6 border border-dark fw-bold field-label text-center">Account</div>
         <div class="col-md-5 border border-dark fw-bold field-status text-center">Action</div>
      </div>

      @foreach ($accounts as $account)
         <div class="row">
            <div class="col-md-6 border border-dark field-label">
               {{ $account->first_name . ' ' . $account->last_name . ' - ' . $account->role->role_name }}
            </div>
            <div class="col-md-5 border border-dark">
               <div class="row my-2">
                  <div class="col md-6">
                     <a href="{{ route('account.edit-role', $account->account_id) }}"
                        class="btn btn-warning d-flex justify-content-center">Update Role</a>
                  </div>
                  <div class="col md-6">
                     <form action="{{ route('account.destroy') }}" method="POST" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="account_id" value="{{ $account->account_id }}">
                        <button type="submit" class="btn btn-danger w-100 delete-confirmation">Delete</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      @endforeach
   </div>

   {{ $accounts->links() }}
@endsection

@section('js-foot')
   <script>
      $('.delete-confirmation').click(function() {
         e.preventDefault();
         swal({
            title: "Apakah Anda Yakin?",
            text: "Akun yang sudah dihapus tidak akan bisa diakses kembali",
            buttons: {
               cancel: "Batal",
               confirm: {
                  'text': 'Kirim',
                  'closeModal': true,
               }
            }
         }).then((result) => {
            if (result) {
               $('#deleteForm').submit();
            }
         });
      });
   </script>
@endsection
