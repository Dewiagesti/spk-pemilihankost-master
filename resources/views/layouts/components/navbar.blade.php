<nav class="site-nav">
    <div class="container">
      <div class="site-navigation">
        <a href="index.html" class="logo m-0">Indekos<span class="text-primary">.</span></a>

        <ul class="js-clone-nav d-none d-lg-inline-block text-left float-right site-menu">
          <li class="active"><a href="/">Home</a></li>
          <li><a href="{{ route('recomendation') }}">Rekomendasi</a></li>
          <li><a href="{{ route('about') }}">Tentang</a></li>
          @auth
            <li><a href="javascript:void(0)">{{ Auth::user()->name; }}</a></li> 
            <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                this.closest('form').submit();">
                    <i class="icon-key"></i>
                    <span class="ml-2">Logout </span>
                </a>
            </li>
          @endauth
          @guest
            <li class="cta-button active">
             
            </li>
          @endguest
        </ul>

        {{-- Modal Login --}}
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Masuk ke aplikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Saya ingin masuk sebagai</p>
                
                <div class="card">
                  <a href="{{ route('register') }}" class="d-flex justify-content-beetwen flex-wrap align-items-center">
                      <img src="https://picsum.photos/500/500" alt="" class="" width="100vh">
                      <p class="ml-4 font-weight-bold">
                        Pencari Kos
                      </p>
                  </a>
                </div>
                <br>
                <div class="card">
                  <a href="{{ route('mitra.register') }}" class="d-flex justify-content-beetwen flex-wrap align-items-center">
                    <img src="https://picsum.photos/seed/picsum/500/500" alt="" width="100vh">
                    <p class="ml-4 font-weight-bold">
                      Mitra Kos
                    </p>
                  </a>
                </div>
              
              </div>

            </div>
          </div>
        </div>


        <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
          <span></span>
        </a>

      </div>
    </div>
  </nav>