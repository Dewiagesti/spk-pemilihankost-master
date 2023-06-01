@extends('layouts.app')

@push('style')
    <style>
      .card-img-top {
          width: 100%;
          height: 15vw;
          object-fit: cover;
      }
    </style>
@endpush
@section('content')
    

  <div class="untree_co_slider-wrap" data-aos="fade-up">
      {{-- <div class="nav-direction">
        <a href="#" class="js-nav-right nav-right"><span class="icon-keyboard_arrow_right"></span></a>
        <a href="#" class="js-nav-left nav-left"><span class="icon-keyboard_arrow_left"></span></a>
      </div> --}}
      <div class="jumbotron jumbotron-fluid" style="background: transparent; z-index: 90;">
        <div class="container">
          <h1 class="display-4">Selamat Datang di Sistem Pendukung Keputusan Pemilihan Indekos</h1>
          <p class="lead">Cari rekomendasi Indekos anda di Bonddowoso</p>
          <!-- <a href="{{ route('login') }}" >Daftar</a> -->
           <a href="javascript:void(0)" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalCenter">Login</a>
        </div>
      </div>
    </div>
    <div class="untree_co-section bg-light">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-4">
          </ul>
        </div> <!-- /.col-lg-4 -->
        </div> <!-- /.col-lg-4 -->
        
      </div> <!-- /.row -->
    </div> <!-- /.container -->
  </div>


  <div class="untree_co-section">
    <div class="container">
      <div class="row align-items-stretch">
        @foreach ($kos as $item)
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="card">
            <img class="card-img-top" src="{{ Storage::url($item->gambar_kamar) }}" alt="Card image cap">
            <div class="card-body">
              <div class="">
                <p>
                  {{ $item->nama_kost }}
                </p>
                <b>
                  {{ Str::limit($item->alamat, 150, '...') }}
                </b>
                <p>
                  {{ Str::limit($item->fasilitas, 150, '...') }}
                </p>
                <p>
                  Harga Rp.{{ $item->harga }}.000 / bulan
                </p>
              </div>  
            </div>
          </div>

        </div> 
        @endforeach
        <!-- /.col-lg-4 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->  
  </div> <!-- /.untree_co-section -->

@endsection
