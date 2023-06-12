@extends('layouts.app')

@section('content')

  
<div class="untree_co-section">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-6">
          <h2 class="text-secondary heading-2">Perhitungan Rekomendasi</h2>
        </div>
      </div>
    </div>
  </div>

<div class="untree_co-section">
    <div class="container">
      <div class="row align-items-stretch">

            <div class="col-lg-3 mb-4 mb-lg-0">
                <form action="{{ route('recomendation') }}" id="filter-form">
                    <div class="form-group">
                        <label>Jenis indeKos</label>
                        <select name="jenis_kost" id="jenis_kost" class="form-control">
                            <option value="">Pilih salah satu</option>
                            <option value="Putra">Putra</option>
                            <option value="Putri">Putri</option>
                        </select>
                    </div>
            </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <button type="button" id="reset-filter" class="btn btn-danger">Reset</button>
                </div>
            </form>
       
                    {{-- <div class="col-lg-3 mb-4 mb-lg-0">
                        <div class="form-group">
                            <label>Harga indeKos</label>
                            <select name="harga" id="harga" class="form-control">
                            <option value="" >Pilih salah satu</option>
                                <option value="250,299">250 - 299</option>
                                <option value="300,349">300 - 349</option>
                                <option value="350,459">350 - 459</option>
                                <option value="460,499">460 - 499</option>
                                <option value="500">>500</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4 mb-lg-0">
                        <div class="form-group">
                            <label>Jarak indeKos</label>
                            <select name="jarak" id="jarak" class="form-control">
                            <option value="">Pilih salah satu</option>
                                <option value="150,350">150m - 350m</option>
                                <option value="360,450">360m - 450m</option>
                                <option value="460,850">460m - 850m</option>
                                <option value="960,999">960m - 1km</option>
                                <option value="1000">1km</option>
                            </select>
                        </div>
                    </div> --}}

                   
                
          

         <!-- /.col-lg-3 -->
        <div class="col-lg-12 mb-4">
            <table id="users-table" class="table table-bordered" style="width: 100%">
                <thead>
                    <tr>
                        <th>Nama Kost</th>
                        <th>Jenis Kost</th>
                        <th>Alamat</th>
                        <th>Jarak</th>
                        <th>Harga</th>
                        <th>Panjang dan Lebar Kamar</th>
                        <th>Keamanan</th>
                        <th>Kebersihan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>           
            </div>
        </div>
      </div> <!-- /.row -->
    </div> <!-- /.container -->  
  </div> 
@endsection

@push('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
$(function(){


    // Datatables 
    var datatables = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('fetch.kosts') }}",
                    data: function(d){
                        d.jenis_kost = $('#jenis_kost').val();
                        console.log(d.jenis_kost);
                        // d.jarak = $('#jarak').val();

                        if ($('#jenis_kost').val() === '') {
                            delete d.jenis_kost;
                        }
                    }
                },
                columns: [
                    { data: 'nama_kost' },
                    { data: 'jenis_kost', name: 'jenis_kost' },
                    { data: 'alamat'},
                    { data: 'jarak'},
                    { data: 'harga'},
                    { data: 'panjang_lebar_kamar'},
                    { data: 'keamanan'},
                    { data: 'kebersihan'}
                ]
            });


    $('#filter-form').on('submit', function(e) {
        e.preventDefault();
        datatables.draw(); 
        // Menggambar ulang tabel dengan memperbarui data menggunakan filter
    });

    $('#reset-filter').on('click', function() {
        $('#filter-form')[0].reset(); 
        $('#jenis_kost').val('');// Mengosongkan nilai input filter
        datatables.draw(); // Menggambar ulang tabel dengan data tanpa filter
    });

    // 
    $('#jenkel').on('change', function () {
        var gender = $(this).val()
        $.ajax({
            url: '/api/gender/'+gender,
            type: 'GET',
            data: {'kos': gender},
            succes: function(res) {
                console.log(res);
            }
        })
    })


    // Fungsi untuk menampilkan detail
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.editProduct', function () {
                var appURL = '{{ env('APP_URL') }}';
                var kost_id = $(this).data('id');
                $.get("/about/" + kost_id +'/edit', function (res) {
                    data = res.data;
                    console.log(data);
                    $('#modelHeading').html("Detail Kost");

                    $('#ajaxModel').modal('show');
                    $('#product_id').val(data.id);
                    $('#gambar_kamar').attr('src', appURL+'/storage/'+data.gambar_kamar)
                    $('#gambar_kamar_mandi').attr('src', appURL+'/storage/'+data.gambar_kamar_mandi)
                    $('#gambar_tampak_depan').attr('src', appURL+'/storage/'+data.gambar_tampak_depan)
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