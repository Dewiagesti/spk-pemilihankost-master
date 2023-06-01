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
            <button type="submit" class="btn btn-primary">Hitung</button>
        </div>
    </form>

         <!-- /.col-lg-3 -->
        <div class="col-lg-12 mb-4 ">
            <div class="">

              
                <table id="users-table" class="table table-bordered ">
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
                            <th>Kebersihan</th>
                            <th>Total</th>
                            <th>Option</th>
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
                                <td>{{ $item->kost->kebersihan }}</td>
                                <td>{{ $item->total }}</td>
                                <td class="d-flex align-item-center">
                                    <a href="#" data-toggle="tooltip"  data-id="{{ $item->id }}" data-original-title="Edit"  class="edit btn btn-primary text-center editProduct">Detail</a>
                                    <a href="https://wa.me/{{ $item->user->no_hp }}" class="btn btn-success">Pesan Sekarang</a>
                                </td>
                            </tr>

                                {{-- modal --}}
                                <div class="modal fade" id="ajaxModel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modelHeading"></h4>
                                            </div>
                                            <div class="modal-body">
                                                <form id="productForm" name="productForm" class="form-horizontal">
                                                <input type="hidden" name="product_id" id="product_id">
                                                    <div class="form-group">
                                                        <label for="name"  class="col-sm-8 control-label font-weight-bold">Gambar Kamar</label>
                                                        <div class="col-sm-12">
                                                            <img id="gambar_kamar" src="" width="100%" alt="Insert link 1 alt text here" />
                                                        </div>
                                                    </div>
                                                      <div class="form-group">
                                                        <label for="name"  class="col-sm-8 control-label font-weight-bold">Gambar Kamar Mandi</label>
                                                        <div class="col-sm-12">
                                                            <img id="gambar_kamar_mandi" width="100%" src="" alt="Insert link 1 alt text here" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name"  class="col-sm-8 control-label font-weight-bold">Gambar Tampak Depan</label>
                                                        <div class="col-sm-12">
                                                            <img id="gambar_tampak_depan" width="100%" src="" alt="Insert link 1 alt text here" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name"  class="col-sm-2 control-label font-weight-bold">Nama</label>
                                                        <div class="col-sm-12">
                                                            <p id="nama_kost"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label font-weight-bold">Jenis Kos</label>
                                                        <div class="col-sm-12">
                                                            <p id="jenis_kost"></p>
                                                        </div>
                                                    </div>   
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label font-weight-bold">Alamat</label>
                                                        <div class="col-sm-12">
                                                            <p id="alamat"></p>
                                                        </div>
                                                    </div>  
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label font-weight-bold">Harga</label>
                                                        <div class="col-sm-12">
                                                            <p id="harga"></p>
                                                        </div>
                                                    </div>     
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label font-weight-bold">Fasilitas</label>
                                                        <div class="col-sm-12">
                                                            <p id="fasilitas"></p>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label font-weight-bold">Panjang Kamar</label>
                                                        <div class="col-sm-12">
                                                            <p id="panjang_kamar"></p>
                                                        </div>
                                                    </div>   
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label font-weight-bold">Lebar Kamar</label>
                                                        <div class="col-sm-12">
                                                            <p id="lebar_kamar"></p>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label font-weight-bold">Keamanan</label>
                                                        <div class="col-sm-12">
                                                            <p id="keamanan"></p>
                                                        </div>
                                                    </div> 
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">Maaf Tidak dapat ditemukan</td>
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