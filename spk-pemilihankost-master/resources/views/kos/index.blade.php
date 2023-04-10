{{-- CONTOH HALAMAN  --}}
<x-app-layout>
    @section('content')
        <div class="content-body">
            <!-- row -->
            <div class="container mb-5">
                {{-- TARUK TAMPILAN DISINI --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Kos</h4>
                         @if(Auth::user()->role == 'mitra')
                         <a href="{{ route('kos.create') }}" class="btn btn-primary">Tambah Data</a>
                         @endif
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama kost</th>
                                        <th>Jenis kost</th>
                                        <th>Alamat</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Harga</th>
                                        <th>Fasilitas</th>
                                        <th>Panjang Kamar</th>
                                        <th>Lebar Kamar</th>
                                        <th>Keamanan</th>
                                        <th>Kebersihan</th>
                                        <th>Mitra</th>
                                        <th>Gambar Kamar</th>
                                        <th>Gambar Kamar Mandi</th>
                                        <th>Gambar Tampak Depan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name_kost }}</td>
                                        <td>{{ $item->jenis_kost }}</td>
                                        <td>{{ $item->alamat ? $item->alamat : '-' }}</td>
                                        <td>{{ $item->latitude ? $item->latitude : '-' }}</td>
                                        <td>{{ $item->longitude ? $item->longitude : '-'  }}</td>
                                        <td>{{ $item->harga ? $item->harga : '-' }}</td>
                                        <td>{{ $item->fasilitas ? $item->fasilitas : '-' }}</td>
                                        <td>{{ $item->panjang_kamar ? $item->panjang_kamar : '-' }}</td>
                                        <td>{{ $item->lebar_kamar ? $item->lebar_kamar : '-' }}</td>
                                        <td>{{ $item->keamanan ? $item->keamanan : '-' }}</td>
                                        <td>{{ $item->kebersihan ? $item->kebersihan : '-' }}</td>
                                        <td>{{ $item->mitra ? $item->mitra : '-' }}</td>
                                        <td>{{ $item->gambar_kamar  ? $item->gambar_kamar : '-' }}</td>
                                        <td>{{ $item->gambar_kamar_mandi ? $item->gambar_kamar_mandi : '-' }}</td>
                                        <td>{{ $item->gambar_tampak_depan ? $item->gambar_tampak_depan : '-' }}</td>
                                        <td class="text-center form-inline">
                                            <a href="{{ route('kos.edit', $item->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>
                                            <form method="POST" action="{{ route('kos.destroy', $item->id) }}" onSubmit="if(!confirm('Yakin akan menghapus data ini?')){return false;}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="16" class="text-center">Data tidak tersedia.</td>
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
