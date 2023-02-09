<div
   class="d-flex p-3 align-items-center justify-content-between w-100 position-absolute bottom-0 bg-dark text-white fs-5">
   <span>&copy; Vegero {{ now()->year }} </span>
   <form action="{{ route('change-language') }}" method="POST" id="changeLanguage">
      @csrf
      <select name="locale" id="locale">
         <option value="">Langauge</option>
         <option value="id">{{ __('lang.id') }}</option>
         <option value="en">{{ __('lang.eng') }}</option>
      </select>
   </form>
</div>

<script>
   $('#locale').change(function() {
      $('#changeLanguage').submit();
   })
</script>
