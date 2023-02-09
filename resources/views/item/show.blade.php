@extends('template.main')

@section('title', 'Item Detail')

@section('container')
   <div class="d-flex align-items-center shadow p-4 gap-5">
      <img src="https://picsum.photos/600/600" alt="" width="200px" height="200px" />
      <div>
         <div class="fs-3 mb-3">Buah APel Buah tomat</div>
         <div class="fw-bold fs-2 text-primary mb-2">Rp. 10.000</div>
         <div class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo eligendi, magnam dignissimos rem
            soluta maxime,
            recusandae iure voluptas incidunt deserunt ea? Sapiente harum perferendis, cupiditate deleniti culpa odio unde
            corrupti minus officiis sequi voluptatibus, quidem nihil suscipit fugiat officia. Ad autem, officiis laudantium
            dolores recusandae nobis et optio dolor amet quaerat aspernatur, neque fugiat a, sed cupiditate eligendi
            praesentium voluptatum unde natus odio non possimus. Nulla placeat autem omnis alias, cumque fuga amet harum,
            quos labore dolorem maxime saepe. Fugiat, eius dolores. Atque molestiae ducimus natus veritatis excepturi modi,
            ipsam fuga suscipit dolor sapiente tempore at totam architecto eaque pariatur necessitatibus repellat accusamus
            provident asperiores praesentium omnis nulla autem. Totam incidunt eos, iusto quisquam praesentium quia vero
            aspernatur, fugit, eaque distinctio excepturi impedit dolores beatae quidem veritatis itaque illo accusamus
            placeat nam omnis. Laudantium qui id mollitia ex earum! Facilis, consequuntur saepe aut voluptate vitae
            quibusdam facere optio error eius architecto, quisquam dolor sequi voluptas quod porro dolore corporis maiores
            placeat dolorem mollitia? Voluptatem a similique dicta perspiciatis numquam asperiores vitae repellendus
            tempore ullam, ipsum quos explicabo aliquid suscipit adipisci, non itaque sit reprehenderit sequi iusto ea
            perferendis ut recusandae. Voluptatem obcaecati voluptas delectus laudantium illo est totam deleniti
            praesentium.
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
