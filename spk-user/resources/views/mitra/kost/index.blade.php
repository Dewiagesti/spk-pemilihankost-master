<x-app-layout-admin>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kost saya</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered verticle-middle table-responsive-sm" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Nama Kost</th>
                                <th scope="col">Jenis Kost</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($kostByUserMitra == null)
                                <tr>
                                    <td colspan="4" class="text-center">Maaf data masih kosong</td>
                                </tr>
                            @else
                            <tr>
                                <td>{{ $kostByUserMitra->nama_kost }}</td>
                                <td>{{ $kostByUserMitra->jenis_kost }}</td>
                                <td><span class="badge badge-primary">Rp.{{ $kostByUserMitra->harga }}</span>
                                </td>
                                <td>
                                    <span>
                                        <a href="javascript:void(0)" class="mr-4 edit-row" data-id="{{ $kostByUserMitra->id }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted"></i> </a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" class="delete-row" data-placement="top" data-id="{{ $kostByUserMitra->id }}" title="Close"><i class="fa fa-close color-danger"></i></a>
                                    </span>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">Tambah Kost</div>
            <div class="card-body">
                <form action="#javascript:void(0)" enctype="multipart/form-data" id="formCreate">
                    <div class="row">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Kost</label>
                                <input type="text" id="name_kost" name="nama_kost" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Harga Kost</label>
                                <input type="text" id="price_kost" name="harga" class="form-control" placeholder="">
                            </div>  
                            <div class="form-group">
                                <label>Jarak Kost</label>
                                <input type="number" id="distance" name="jarak" class="form-control" placeholder="">
                            </div> 
                            <div class="form-group">
                                <label>Panjang dan lebar Kost</label>
                                <select name="panjang_lebar_kamar" id="panjang_lebar_kamar" class="form-control" id="location">
                                    <option value="0" selected disabled>Pilih</option>
                                    <option value="2 x 3">2 x 3</option>
                                    <option value="2,5 x 3">2,5 x 3</option>
                                    <option value="2,7 x 2,7">2,7 x 2,7</option>
                                    <option value="2,7 x 3">2,7 x 3</option>
                                    <option value="3 x 3">3 x 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keamanan Kost</label>
                                <select name="keamanan" id="security" class="form-control" id="type">
                                    <option value="0" selected disabled>Pilih</option>
                                    <option value="Sangat Aman">Sangat Aman</option>
                                    <option value="Aman">Aman</option>
                                    <option value="Cukup Aman">Cukup Aman</option>
                                    <option value="Kurang Aman">Kurang Aman</option>
                                    <option value="Tidak Aman">Tidak Aman</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kost</label>
                                <select name="jenis_kost" class="form-control" id="type">
                                    <option value="0" selected disabled>Pilih</option>
                                    <option value="Putra">Putra</option>
                                    <option value="Putri">Putri</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fasilitas Kost</label>
                                <input type="text" name="fasilitas" id="facility" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Kebersihan Kost</label>
                                <select name="kebersihan" class="form-control" id="cleanliness">
                                    <option value="0" selected disabled>Pilih</option>
                                    <option value="Tidak Bersih">Tidak Bersih</option>
                                    <option value="Kurang Bersih">Kurang Bersih</option>
                                    <option value="Cukup Bersih">Cukup Bersih</option>
                                    <option value="Bersih">Bersih</option>
                                    <option value="Sangat Bersih">Sangat Bersih</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Lokasi Kost</label>
                                <select name="lokasi" id="location" class="form-control">
                                    <option value="0" selected disabled>Pilih</option>
                                    <option value="Sangat Strategis">Sangat Strategis</option>
                                    <option value="Strategis">Strategis</option>
                                    <option value="Cukup Strategis">Cukup Strategis</option>
                                    <option value="Kurang Strategis">Kurang Strategis</option>
                                    <option value="Tidak Strategis">Tidak Strategis</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Daerah sekitar Kost</label>
                                <select name="daerah_sekitar" id="area" class="form-control">
                                    <option value="0" selected disabled>Pilih</option>
                                    <option value="Dekat dengan kampus">Dekat dengan kampus</option>
                                    <option value="Kurang Lebih dekat dengan kampus">Kurang Lebih dekat dengan kampus</option>
                                    <option value="Dekat dengan Jalan Utama">Dekat dengan Jalan Utama</option>
                                    <option value="Dekat dengan Pembelanjaan">Dekat dengan Pembelanjaan</option>
                                    <option value="Jauh dari Kampus">Jauh dari Kampus</option>
                                </select>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label>Alamat Kost</label>
                        <textarea id="" cols="30" name="alamat" id="address" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar Kamar</label>
                        <input type="file" class="form-control" name="gambar_kamar" >
                        <img src="" id="room_image" alt="Gambar Defaul">
                    </div>
                    <div class="form-group">
                        <label>Gambar Kamar Mandi</label>
                        <input type="file" class="form-control" name="gambar_kamar_mandi" >
                        <img src="" id="bathroom_image" alt="Gambar Defaul">
                    </div>
                                        
                    <div class="form-group">
                        <label>Gambar Kamar Tampak Depan</label>
                        <input type="file" class="form-control" name="gambar_tampak_depan" >
                        <img src="" id="front_view_image" alt="Gambar Defaul">
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" id="btn-submit" {{ ($kostByUserMitra == null) ? '' : 'disabled'  }}>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                var row = $(this).closest('tr');
                $('#formCreate').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('mitra.kost.store') }}',
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            alert(response.message);
                            $('#formCreate')[0].reset();
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                });



                $('#myTable').on('click', '.delete-row', function(e) {
                    e.preventDefault();
                    var row = $(this).closest('tr');
                    var id = $(this).data('id');
                    if (confirm('Anda yakin ingin menghapus data ini?')) {
                        $.ajax({
                            type: 'GET',
                            url: '/mitra/kost/' + id,
                            success: function(response) {
                                alert(response.success);
                                row.remove();
                                setTimeout(function(){
                                    $( "#mytable" ).load( "Halaman ini akan tereload" );
                                }, 2000);
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });

                $('#myTable').on('click', '.edit-row', function (e) {
                    e.preventDefault();
                    var id =  $(this).data('id');
                    $('#btn-submit').attr("disabled", false)
                    $.ajax({
                        type: 'GET',
                        url: '/mitra/kost/'+id+'/edit',
                        dataType: 'json', 
                        error: function(xhr, status, error) { console.log(xhr.responseText); },
                        success: function(response) {
                            res = response.data;
                            console.log(res);
                            $('#name_kost').val(res.nama_kost)
                            $('#type').val(res.jenis_kost)
                            $('#price_kost').val(res.harga)
                            $('#distance').val(res.jarak)
                            $('#facility').val(res.fasilitas)
                            $('#panjang_lebar_kamar').val(res.panjang_lebar_kamar)
                            $('#cleanliness').val(res.kebersihan)
                            $('#security').val(res.keamanan)
                            $('#address').val(res.alamat)
                            $('#location').val(res.lokasi)
                            $('#area').val(res.lokasi)
                            $('#room_image').attr('src', res.gambar_kamar)
                            $('#bathroom_image').attr('src', res.gambar_kamar_mandi)
                            $('#front_view_image').attr('src', res.gambar_tampak_depan)
                        },
                    })
                })
            });

        </script>
    @endpush
</x-app-layout-admin>