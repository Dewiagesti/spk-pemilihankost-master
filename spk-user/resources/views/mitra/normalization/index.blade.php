<x-app-layout-admin>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Datatable Normalsasi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Nama Kost</th>
                                <th>Harga</th>
                                <th>Jarak</th>
                                <th>Fasilitas</th>
                                <th>Panjang lebar kamar</th>
                                <th>Keamanan</th>
                                <th>Kebersihan</th>
                                <th>Lokasi</th>
                                <th>Daerah Sekitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($normalizations as $normalization)
                                <tr>
                                    <td>{{ $normalization->kost_id }}</td>
                                    <td>{{ $normalization->harga }}</td>
                                    <td>{{ $normalization->jarak }}</td>
                                    <td>{{ $normalization->fasilitas }}</td>
                                    <td>{{ $normalization->panjang_lebar_kamar }}</td>
                                    <td>{{ $normalization->keamanan }}</td>
                                    <td>{{ $normalization->kebersihan }}</td>
                                    <td>{{ $normalization->lokasi }}</td>
                                    <td>{{ $normalization->daerah_sekitar }}</td>
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