<header class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
   <div class="container-fluid">
      <a href="{{ route('index') }}" class="d-flex fw-bold display-5 text-white text-decoration-none">
         Vegero
         <img src="{{ asset('images/totoro.png') }}" alt="" width="30px" height="30px" />
      </a>
      @if (@$account)
         <div>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('item.index') }}">
                        {{ __('lang.home') }}
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ Request::is('/order*') ? 'active' : '' }}" href="{{ route('order.index') }}">
                        {{ __('lang.order') }}
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ Request::is('/account*') ? 'active' : '' }}"
                        href="{{ route('account.edit') }}">
                        {{ __('lang.profile') }}
                     </a>
                  </li>
                  @if ($account->hasRole('admin'))
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('account.index') }}">
                           {{ __('lang.account_maintenance') }}
                        </a>
                     </li>
                  @endif
               </ul>
            </div>
         </div>
      @endif

      <div class="d-flex ml-auto gap-3 align-items-center">
         @if (@$account)
            <a href="{{ route('logout') }}" class="btn btn-primary">{{ __('lang.logout') }}</a>
         @else
            <a href="{{ route('register') }}" class="text-white text-decoration-none">{{ __('lang.register') }}</a>
            <a href="{{ route('login') }}" class="btn btn-primary">{{ __('lang.login') }}</a>
         @endif
      </div>
   </div>
</header>
<div class="bg-dark border-white border-top py-3">
   <marquee class="text-white" direction="right">{{ __('lang.banner') }}
   </marquee>
</div>
