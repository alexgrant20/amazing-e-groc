<header class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
   <div class="container-fluid">
      <a href="{{ route('index') }}" class="d-flex fw-bold display-5 text-white text-decoration-none">
         Vegero
         <img src="{{ asset('images/totoro.png') }}" alt="" width="30px" height="30px" />
      </a>
      <div>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                     href="{{ route('item.index') }}">
                     {{ __('Home') }}
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ Request::is('/order*') ? 'active' : '' }}" href="{{ route('order.index') }}">
                     {{ __('Order') }}
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ Request::is('/account*') ? 'active' : '' }}" href="#">
                     {{ __('Profile') }}
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">
                     {{ __('Account Maintenance') }}
                  </a>
               </li>
            </ul>
         </div>
      </div>
      <div class="d-flex ml-auto gap-3 align-items-center">
         @auth
            <a href="{{ route('logout') }}" class="btn btn-primary">{{ __('Logout') }}</a>
         @else
            <a href="{{ route('register') }}" class="text-white text-decoration-none">{{ __('Register') }}</a>
            <a href="{{ route('login') }}" class="btn btn-primary">{{ __('Login') }}</a>
         @endauth
      </div>
   </div>
</header>
<div class="bg-dark border-white border-top py-3">
   <marquee class="text-white" direction="right">Hi vegero users👋 Go get your fresh vegatable right now!🥒
   </marquee>
</div>
