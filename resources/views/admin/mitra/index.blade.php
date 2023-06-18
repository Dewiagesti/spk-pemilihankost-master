<x-app-layout-admin>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Datatable Mitra</h4>
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
                    <table id="example" class="display" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userRoleMitra as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>{{ $user->no_hp }}</td>
                                    <td>{{ $user->longitude }}</td>
                                    <td>{{ $user->latitude }}</td>
                                    <td>
                                        <a href="/admin/edit-mitra/{{ $user->id }}" class="btn btn-info">Edit</a>
                                        <a href="/admin/delete-user/{{ $user->id }}" class="btn btn-danger">Hapus</a>
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