@extends('template.main')

@section('title', 'Item Detail')

@section('container')
   <div class="d-flex align-items-center shadow p-4 gap-5">
      <img src="https://picsum.photos/600/600" alt="" width="200px" height="200px" />
      <div>
         <div class="fs-3 mb-3">{{ $item->item_name }}</div>
         <div class="fw-bold fs-2 text-primary mb-2">Rp. {{ number_format($item->price, 0, ',', '.') }}</div>
         <div class="mb-5">
            {{ $item->item_desc }}
         </div>

         <div class="text-end">
            <form action="{{ route('order.store') }}" method="post">
               @csrf
               <input type="hidden" name="item_id" value="{{ $item->item_id }}">
               <button
                  class="btn btn-lg btn-primary {{ !$isItemInCart ?: 'disabled' }}">{{ $isItemInCart ? _('Already in cart') : _('Buy Now') }}</button>
            </form>
         </div>
      </div>
   </div>
@endsection
