@extends('template.main')

@section('title', 'Cart')

@section('container')

   <h2>Order</h2>
   @foreach ($orders as $order)
      <div class="row mb-3">
         <div class="col-md-3">
            <img src="https://picsum.photos/seed/%22.$this-%3Efaker-%3Eunique()-%3Eword.%22/520/400/" alt=""
               class="border-circle" width="125px" height="125px">
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
               <button type="submit" class="btn btn-danger">Delete</button>
            </form>
         </div>

      </div>
   @endforeach


@endsection
