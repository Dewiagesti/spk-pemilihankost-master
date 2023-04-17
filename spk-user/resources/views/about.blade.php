@extends('layouts.app')
@section('content')
<div class="untree_co-section">
    <div class="container"> 
      <div class="row gutter-v2">

        <div class="col-lg-12">
            <div class="">
                <div class="">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama.</th>
                                <th>Jenis Kos.</th>
                                <th>Alamat.</th>
                                <th>Harga.</th>
                                <th>Aksi.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kosts as $kost)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kost->nama_kost }}</td>
                                <td>{{ $kost->jenis_kost }}</td>
                                <td>{{ $kost->alamat }}</td>
                                <td>{{ $kost->harga }}</td>
                                <td>
                                    <a href="#" data-toggle="tooltip"  data-id="{{ $kost->id }}" data-original-title="Edit"  class="edit btn btn-primary editProduct">Detail</a>
                                </td>
                            </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


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

      </div> <!-- /.row -->
    </div> <!-- /.container -->
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