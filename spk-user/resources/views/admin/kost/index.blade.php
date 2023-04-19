<x-app-layout-admin>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Datatable</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Kost</th>
                                <th>Alamat</th>
                                <th>Harga</th>
                                <th>Panjang Kamar</th>
                                <th>Lebar Kamar</th>
                                <th>Keamanan</th>
                                <th>Kebersihan</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kosts as $kost)
                                <tr>
                                    <td>{{ $kost->nama_kost }}</td>
                                    <td>{{ $kost->jenis_kost }}</td>
                                    <td>{{ $kost->alamat }}</td>
                                    <td>{{ $kost->harga }}</td>
                                    <td>{{ $kost->panjang_kamar }}</td>
                                    <td>{{ $kost->lebar_kamar }}</td>
                                    <td>{{ $kost->keamanan }}</td>
                                    <td>{{ $kost->kebersihan }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
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
        })
    </script>
    @endpush
</x-app-layout-admin>