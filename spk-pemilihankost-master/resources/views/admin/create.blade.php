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
                        <a href="{{ route('admin.index') }}" class="btn btn-primary">Lihat Data</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control @error('nama') 'is-invalid' @enderror" value="{{ old('nama') }}" required>
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
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') 'is-invalid' @enderror" required>
                                        @error('email')
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
