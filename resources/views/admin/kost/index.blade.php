<x-app-layout-admin>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Datatable Kost</h4>
            </div>
            <div class="card-body">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Pemilik</th>
                                <th>Nama Kost</th>
                                <th>Jenis Kost</th>
                                <th>Alamat</th>
                                <th>Harga</th>
                                <th>Panjang Kamar</th>
                                <th>Keamanan</th>
                                <th>Kebersihan</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kosts as $kost)
                                <tr>
                                    <td>{{ $kost->user->name }}</td>
                                    <td>{{ $kost->nama_kost }}</td>
                                    <td>{{ $kost->jenis_kost }}</td>
                                    <td>{{ $kost->alamat }}</td>
                                    <td>{{ $kost->harga }}</td>
                                    <td>{{ $kost->panjang_lebar_kamar }}</td>
                                    <td>{{ $kost->keamanan }}</td>
                                    <td>{{ $kost->kebersihan }}</td>
                                    <td>
                                        <a href="#" data-toggle="tooltip"  data-id="{{ $kost->id }}" data-original-title="Edit"  class="edit btn btn-primary editProduct">Detail</a>
                                    </td>
                                </tr>
                            @endforeach

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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <!-- Datatable -->
    <script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(function() {
            var table = $('#example').DataTable();


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
</x-app-layout-admin>