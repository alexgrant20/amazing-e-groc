@extends('template.main')

@section('title', 'Items')

@section('container')
   <div class="grid-layout-5 mb-4">
      @foreach ($items as $item)
         <a href="{{ route('item.show', $item->item_id) }}" class="text-decoration-none text-black">
            <div class="d-flex gap-2 shadow py-2 px-3 align-items-center">
               <img src="https://picsum.photos/600/600" alt="" width="120px" height="120px" class="border-circle">
               <div class="d-flex flex-column flex-grow-1">
                  <span class="fw-bold mb-2 fs-7">{{ $item->item_name }}</span>
                  <span class="fw-bold mb-3 fs-6">Rp. {{ number_format($item->price, 0, ',', '.') }}</span>
               </div>
            </div>
         </a>
      @endforeach
   </div>

   {{ $items->links() }}
@endsection
