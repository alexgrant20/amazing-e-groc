@if ($message = Session::get('success-swal'))
    <script>
      swal("Success", '{{ $message }}', "success");
    </script>
@endif

@if ($message = Session::get('error-swal'))
    <script>
      swal("Failed", '{{ $message }}', "error");
    </script>
@endif

@if ($message = Session::get('warning-swal'))
    <script>
      swal("Warning", '{{ $message }}', "warning");
    </script>
@endif

@if ($errors->any())
   <script>
      let errorMessages = {
         @foreach ($errors->keys() as $error)
            @error($error)
               '{{ $error }}': '{{ $message }}',
            @enderror
         @endforeach
      };
      Object.keys(errorMessages).forEach(inputName => {
         $(`[name="${inputName}"]`).addClass("is-invalid");
         let errMessageElement = `<div class='invalid-feedback'>${errorMessages[inputName]}</div>`;
         $(errMessageElement).insertAfter(`[name="${inputName}"]`);
      });
   </script>
@endif
