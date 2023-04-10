{{-- CONTOH HALAMAN  --}}
<x-app-layout>
    @section('content')
        <div class="content-body">
            <!-- row -->
            <div class="container mb-5">
                {{-- TARUK TAMPILAN DISINI --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Admin</h4>
                        <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>No Hanphone</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->alamat ? $item->alamat : '-' }}</td>
                                        <td>{{ $item->no_hp ? $item->no_hp : '-' }}</td>
                                        <td class="text-center form-inline">
                                            <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>
                                            <form method="POST" action="{{ route('admin.destroy', $item->id) }}" onSubmit="if(!confirm('Yakin akan menghapus data ini?')){return false;}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <div class="card-header">
            </div>
        </div>
    @endsection
</x-app-layout>
