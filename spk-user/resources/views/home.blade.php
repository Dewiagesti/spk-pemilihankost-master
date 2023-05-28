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
{{-- 
      <div class="untree_co_slider">
        <div class="item">
          <img src="{{ asset('homespace/images/property_1-min.jpg') }}" alt="Image" class="img-fluid">

          <div class="property-contents">
            <strong class="current-price text-secondary">$999,000</strong>
            <span class="old-price">$1,000,299</span>
            <h2>
              <a href="#"><span>2 Zwar Place, Florey</span></a>
            </h2>
          </div>

          <div class="property_details">

            <ul class="list-unstyled specs">
              <li class="d-inline-flex align-items-center">
                <span class="icon-wrap flaticon-bathtub"></span>
                <strong>2</strong>
              </li>
              <li class="d-inline-flex align-items-center">
                <span class="icon-wrap flaticon-bed"></span>
                <strong>4</strong>
              </li>
              <li class="d-inline-flex align-items-center">
                <span class="icon-wrap flaticon-house-size"></span>
                <strong>120<sup>2</sup></strong>
              </li>
            </ul>

          </div>

        </div> 
      </div> --}}
    </div>

    <div class="untree_co-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6 mb-5">
            <h2 class="text-secondary heading">We will help you find your home</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="row">
              <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                <div class="service">
                  <div class="icon-wrap"><span class="flaticon-building"></span></div>
                  <div>
                    <h3><a href="#">The Word Mountains</a></h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                <div class="service">
                  <div class="icon-wrap"><span class="flaticon-bathtub"></span></div>
                  <div>
                    <h3><a href="#">The Word Mountains</a></h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                <div class="service">
                  <div class="icon-wrap"><span class="flaticon-bed"></span></div>
                  <div>
                    <h3><a href="#">The Word Mountains</a></h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                <div class="service">
                  <div class="icon-wrap"><span class="flaticon-house-size"></span></div>
                  <div>
                    <h3><a href="#">The Word Mountains</a></h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                  </div>
                </div>
              </div>     
            </div>
          </div>

        </div>
      </div>
    </div>


    <div class="untree_co-section bg-light">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-4">
            <ul class="list-unstyled list-icons">

              <li>
                <a href="#" class="d-flex align-items-center">
                  <span class="icon-wrap">
                    <span class="flaticon-bed"></span>
                  </span>
                  <span class="text">
                  Right at the coast of the Semantics Vokalia and Consonantia
                </span>
              </a>
            </li>

            <li>
              <a href="#" class="d-flex align-items-center">
                <span class="icon-wrap">
                  <span class="flaticon-building"></span>
                </span>
                <span class="text">
                  And if she hasn’t been rewritten then Vokalia and Consonantia
                </span>
              </a>
            </li>

            <li>
              <a href="#" class="d-flex align-items-center">
                <span class="icon-wrap">
                  <span class="flaticon-garage"></span>
                </span>
                <span class="text">
                  Separated they live in Bookmarksgrove right at  large
                </span>
              </a>
            </li>

            <li>
              <a href="#" class="d-flex align-items-center">
                <span class="icon-wrap">
                  <span class="flaticon-map"></span>
                </span>
                <span class="text">
                  And if she hasn’t been rewritten then large language ocean.
                </span>
              </a>
            </li>

            <li>
              <a href="#" class="d-flex align-items-center">
                <span class="icon-wrap">
                  <span class="flaticon-shower"></span>
                </span>
                <span class="text">
                  And if she hasn’t been rewritten then Vokalia and Consonantia
                </span>
              </a>
            </li>

          </ul>
        </div> <!-- /.col-lg-4 -->
        <div class="col-lg-6 mb-4 mb-lg-0">
          <img src="images/img_portrait_1.jpg" alt="Image" class="img-fluid rounded">
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
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="untree_co-testimonial h-100">

            <blockquote>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque animi omnis quas voluptate aliquam dolore facere, exercitationem, quos nihil iusto.</p>
            </blockquote>
            <div class="author d-flex align-items-center">
              <div class="author-picture mr-3"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></div>
              <div class="author-name">
                <strong class="d-block">John Smith</strong>
                <span>CTO &mdash; Slack, Inc.</span>
              </div>
            </div>
          </div> <!-- /.untree_co-testimonial -->
        </div> <!-- /.col-lg-4 -->
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="untree_co-testimonial h-100">

            <blockquote>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque animi omnis quas voluptate aliquam dolore facere, exercitationem, quos nihil iusto.</p>
            </blockquote>
            <div class="author d-flex align-items-center">
              <div class="author-picture mr-3"><img src="images/person_3.jpg" alt="Image" class="img-fluid"></div>
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
