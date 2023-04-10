{{-- CONTOH HALAMAN  --}}
<x-app-layout>
    @section('content')
        <div class="content-body">
            <!-- row -->
            <div class="container mb-5">
                {{-- TARUK TAMPILAN DISINI --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah</h4>
                        <a href="{{ route('kos.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kos.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama_kost">Nama Kost</label>
                                        <input type="text" name="nama_kost" id="nama_kost" class="form-control @error('nama_kost') 'is-invalid' @enderror" value="{{ old('nama_kost') }}" required>
                                        @error('nama_kost')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jenis_kost">Jenis Kos</label>
                                        <select name="jenis_kost" id="jenis_kost" class="form-control @error('jenis_kost') 'is-invalid' @enderror" value="{{ old('jenis_kost') }}" required>
                                            <option>Pilih jenis kos</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('jenis_kost')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="alamat">alamat</label>
                                        <input type="alamat" name="alamat" id="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') 'is-invalid' @enderror" required>
                                        @error('alamat')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="latitude">latitude</label>
                                        <input type="latitude" name="latitude" id="latitude" value="{{ old('latitude') }}" class="form-control @error('latitude') 'is-invalid' @enderror" required>
                                        @error('latitude')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="longitude">longitude</label>
                                        <input type="longitude" name="longitude" id="longitude" class="form-control  @error('longitude') 'is-invalid' @enderror" required>
                                        @error('longitude')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="harga">harga</label>
                                        <input type="text" name="harga" id="harga" class="form-control @error('harga') 'is-invalid' @enderror" value="{{ old('harga') }}" required>
                                        @error('harga')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="fasilitas">fasilitas</label>
                                        <input type="text" name="fasilitas" id="fasilitas" class="form-control @error('fasilitas') 'is-invalid' @enderror" value="{{ old('fasilitas') }}" required>
                                        @error('fasilitas')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="panjang_kamar">panjang kamar</label>
                                        <input type="panjang_kamar" name="panjang_kamar" id="panjang_kamar" class="form-control @error('panjang_kamar') 'is-invalid' @enderror" value="{{ old('panjang_kamar') }}" required>
                                        @error('panjang_kamar')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lebar_kamar">lebar_kamar</label>
                                        <input type="lebar_kamar" name="lebar_kamar" id="lebar_kamar" class="form-control @error('lebar_kamar') 'is-invalid' @enderror" value="{{ old('lebar_kamar') }}" required>
                                        @error('lebar_kamar')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="keamanan">keamanan</label>
                                        <input type="keamanan" name="keamanan" id="keamanan" class="form-control @error('keamanan') 'is-invalid' @enderror" value="{{ old('keamanan') }}" required>
                                        @error('keamanan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Kebersihan">Kebersihan</label>
                                        <input type="Kebersihan" name="Kebersihan" id="Kebersihan" class="form-control @error('Kebersihan') 'is-invalid' @enderror" value="{{ old('Kebersihan') }}" required>
                                        @error('Kebersihan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="mitra">Mitra</label>
                                        <select name="mitra" id="mitra" class="form-control @error('mitra') 'is-invalid' @enderror" value="{{ old('mitra') }}" required>
                                            <option>Pilih mitra</option>
                                            @foreach($mitra as $item)
                                            <option value="{{ $item->id }}" {{ old('mitra', $item->id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('mitra')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="gambar_kamar">gambar_kamar</label>
                                        <div class="custom-file">
                                                <input type="file" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        @error('gambar_kamar')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="gambar_kamar_mandi">gambar_kamar_mandi</label>
                                        <div class="custom-file">
                                                <input type="file" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        @error('gambar_kamar_mandi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="gambar_tampak_depan">gambar_tampak_depan</label>
                                        <div class="custom-file">
                                                <input type="file" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        @error('gambar_tampak_depan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <div class="card-header">
            </div>
        </div>
    @endsection
</x-app-layout>
