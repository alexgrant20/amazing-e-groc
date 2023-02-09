@extends('template.main')

@section('title', 'Cart')

@section('container')

   <h2>Order</h2>
   @forelse ($orders as $order)
      <div class="row mb-3">
         <div class="col-md-3">
            <img src="https://picsum.photos/600/600" alt="" class="border-circle" width="125px" height="125px">
         </div>

         <div class="col-md-3">
            {{ $order->item->item_name }}
         </div>

         <div class="col-md-3">
            <span class="fw-bold mb-3 fs-6">Rp. {{ number_format($order->item->price, 0, ',', '.') }}</span>
         </div>

         <div class="col-md-3">
            <form action="{{ route('order.destroy') }}" method="POST">
               @csrf
               @method('DELETE')
               <input type="hidden" name="item_id" value="{{ $order->item_id }}">
               <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
            </form>
         </div>

      </div>
   @empty
      <h2 class="text-danger">{{ __('No item inside the cart!') }}</h2>
   @endforelse

   @if ($orders->count() > 0)
      <div class="text-end">
         <form action="{{ route('order.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-warning text-white">{{ __('Checkout') }}</button>
         </form>
      </div>
   @endif
@endsection
