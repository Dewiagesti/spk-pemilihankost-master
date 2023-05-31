@extends('layouts.app')

@section('content')
    

  <div class="untree_co_slider-wrap" data-aos="fade-up">
      {{-- <div class="nav-direction">
        <a href="#" class="js-nav-right nav-right"><span class="icon-keyboard_arrow_right"></span></a>
        <a href="#" class="js-nav-left nav-left"><span class="icon-keyboard_arrow_left"></span></a>
      </div> --}}
      <div class="jumbotron jumbotron-fluid" style="background: transparent">
        <div class="container">
          <h1 class="display-4">Selamat Datang di Sistem Pendukung Keputusan Pemilihan Indekos</h1>
          <p class="lead">Cari rekomendasi Indekos anda di Bonddowoso</p>
          <a href="{{ route('login') }}" class="btn btn-primary">Daftar</a>
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
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="untree_co-testimonial h-100">

            <blockquote>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque animi omnis quas voluptate aliquam dolore facere, exercitationem, quos nihil iusto.</p>
            </blockquote>
            <div class="author d-flex align-items-center">
              <div class="author-picture mr-3"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></div>
              <div class="author-name">
                <strong class="d-block">John Smith</strong>
                <span>CTO &mdash; Slack, Inc.</span>
              </div>
            </div>
          </div> <!-- /.untree_co-testimonial -->
        </div> <!-- /.col-lg-4 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->  
  </div> <!-- /.untree_co-section -->

@endsection
