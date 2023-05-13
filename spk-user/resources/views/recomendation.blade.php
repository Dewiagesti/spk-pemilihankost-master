@extends('layouts.app')

@section('content')
<div class="untree_co-section">
    <div class="container">
      <div class="row align-items-stretch">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <!-- /.untree_co-testimonial -->
            <div class="card">
                <div class="card-header"><h5>Perhitungan</h5></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Jenis indeKos</label>
                        <select name="" id="" class="form-control">
                            <option value="">Pilih salah satu</option>
                            <option value="1">Putra</option>
                            <option value="2">Putri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga indeKos</label>
                        <select name="" id="" class="form-control">
                        <option value="" >Pilih salah satu</option>
                            <option value="1">200 - 300</option>
                            <option value="2">300 - 350</option>
                            <option value="3">350 - 400</option>
                            <option value="4">460 - 500</option>
                            <option value="5">>500</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jarak indeKos</label>
                        <select name="" id="" class="form-control">
                        <option value="">Pilih salah satu</option>
                            <option value="1">150m - 350m</option>
                            <option value="2">360m - 450m</option>
                            <option value="3">460m - 850m</option>
                            <option value="4">960m - 1km</option>
                            <option value="5">1km</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Hitung</button>
                    </div>
                </div>
            </div>
        </div> <!-- /.col-lg-4 -->
        <div class="col-lg-8 mb-4 ">
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
                        @foreach ($rows as $item)
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
                        @endforeach
                    </tbody>
                </table>

              
            </div>
          
        </div>
      </div> <!-- /.row -->
    </div> <!-- /.container -->  
  </div> 
@endsection

@push('scripts')
{{-- <script>
    $(document).ready(function() {
        $.ajax({
            url: '{{ route("rangking.index") }}',
            method: 'GET',
            success: function(data) {
              
                var tableBody = $('#users-table tbody');

                $.each(data, function(index, rangking) {
                    var row = '<tr>' +
                        '<td>' + rangking.id + '</td>' +
                        '<td>' + rangking.kost_id + '</td>' +
                        '<td>' + rangking.jenis_kost + '</td>' +
                        '<td>' + rangking.alamat + '</td>' +
                        '<td>' + rangking.jarak + '</td>' +
                        '<td>' + rangking.harga + '</td>' +
                        '<td>' + rangking.panjang_lebar_kamar + '</td>' +
                        '<td>' + rangking.keamanan + '</td>' +
                        '<td>' + rangking.total + '</td>' +
                    '</tr>';
                    tableBody.append(row);
                });
            }
        });
    });
</script> --}}
@endpush