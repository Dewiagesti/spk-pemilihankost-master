@extends('layouts.app')
@section('content')


<div class="untree_co-section">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-12">
          <h2 class="text-secondary heading-2 mb-4">Tentang Aplikasi Kos</h2>
          <div class="text-left">
                <p>
                    Aplikasi bertema indekos adalah platform digital yang memudahkan pengguna dalam mencari dan menyewa kamar kos atau kosan. Dengan fitur pencarian yang efisien, pengguna dapat dengan cepat menemukan kostan sesuai dengan kriteria mereka, seperti lokasi, harga, fasilitas, dan jenis kostan.
                </p>
                <p>
                    Aplikasi ini menyediakan informasi detail tentang setiap kostan yang terdaftar, termasuk foto, deskripsi fasilitas, dan. Pengguna dapat melihat kondisi dan kualitas kostan sebelum membuat keputusan.
                </p>
                    Pemesanan dan pembayaran dilakukan secara online melalui aplikasi, dengan metode pembayaran yang beragam, seperti transfer bank atau pembayaran elektronik. Fitur pesan internal memungkinkan pengguna berinteraksi langsung dengan pemilik atau pengelola kostan untuk pertanyaan, penawaran, atau negosiasi harga.Aplikasi ini juga mengutamakan keamanan data pribadi pengguna.
                <p>
                    Dalam ringkasan, aplikasi bertema indekos adalah solusi praktis bagi mereka yang mencari tempat tinggal sementara atau jangka panjang. Dengan fitur-fitur yang lengkap dan mudah digunakan, aplikasi ini mempermudah pengguna dalam mencari dan menyewa kostan sesuai dengan preferensi mereka.
                </p>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@push('scripts')
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.editProduct', function () {
                var kost_id = $(this).data('id');
                $.get("/about/" + kost_id +'/edit', function (res) {
                    data = res.data;
                    console.log(data);
                    $('#modelHeading').html("Detail Kost");

                    $('#ajaxModel').modal('show');
                    $('#product_id').val(data.id);
                    $('#nama_kost').html(data.nama_kost);
                    $('#jenis_kost').html(data.jenis_kost);
                    $('#alamat').html(data.alamat);
                    $('#harga').html(data.harga);
                    $('#fasilitas').html(data.fasilitas);
                    $('#panjang_kamar').html(data.panjang_kamar);
                    $('#lebar_kamar').html(data.lebar_kamar);
                    $('#keamanan').html(data.keamanan);
                })
            });
        })
    </script>
@endpush