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
            <form action="{{ route('recomendation') }}">
            <div class="form-group">
                <label>Jenis indeKos</label>
                <select name="jenis_kost" id="jenkel" class="form-control">
                    <option value="">Pilih salah satu</option>
                    <option value="Putra">Putra</option>
                    <option value="Putri">Putri</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3 mb-4 mb-lg-0">
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
        </div>

        <div class="col-lg-3 mb-4 mb-lg-0">
            <button class="btn btn-primary">Hitung</button>
        </div>
    </form>

         <!-- /.col-lg-3 -->
        <div class="col-lg-12 mb-4 ">
            <div class="">

              
                <table id="users-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kost</th>
                            <th>Jenis Kost</th>
                            <th>Alamat</th>
                            <th>Jarak</th>
                            <th>Harga</th>
                            <th>Panjang dan Lebar Kamar</th>
                            <th>Keamanan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rows as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kost->nama_kost }}</td>
                                <td>{{ $item->kost->jenis_kost }}</td>
                                <td>{{ $item->kost->alamat }}</td>
                                <td>{{ $item->kost->jarak }}m</td>
                                <td>Rp.{{ $item->kost->harga }}.000</td>
                                <td>{{ $item->kost->panjang_lebar_kamar }}m</td>
                                <td>{{ $item->kost->keamanan }}</td>
                                <td>{{ $item->total }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>Maaf Tidak dapat ditemukan</td>
                            </tr>
                        @endforelse
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
})
</script>
@endpush