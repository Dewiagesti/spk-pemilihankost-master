{{-- CONTOH HALAMAN  --}}
<x-app-layout>
    @section('content')
        <div class="content-body">
            <!-- row -->
            <div class="container mb-5">
                {{-- TARUK TAMPILAN DISINI --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit</h4>
                        <a href="{{ route('kos.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kos.update', $data->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control @error('nama') 'is-invalid' @enderror" value="{{ old('nama', $data->name) }}" required>
                                        @error('nama')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="{{ old('email', $data->email) }}" class="form-control @error('email') 'is-invalid' @enderror" required>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone">No Handphone</label>
                                        <input type="number" name="phone" id="phone" value="{{ old('phone', $data->phone) }}" class="form-control @error('phone') 'is-invalid' @enderror" required>
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control  @error('password') 'is-invalid' @enderror" required>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') 'is-invalid' @enderror" value="{{ old('alamat', $data->alamat) }}" required>
                                        @error('alamat')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="longitude">Longitude</label>
                                        <input type="text" name="longitude" id="longitude" class="form-control @error('longitude') 'is-invalid' @enderror" value="{{ old('longitude', $data->longitude) }}" required>
                                        @error('longitude')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        <input type="text" name="latitude" id="latitude" class="form-control @error('latitude') 'is-invalid' @enderror" value="{{ old('latitude', $data->latitude) }}" required>
                                        @error('latitude')
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
