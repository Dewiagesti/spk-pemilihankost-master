<x-app-layout-admin>
<div class="col-lg-12">
    <h4>Edit {{ $user->name }}</h4>
</div>

<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Input Style</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="/admin/update-mitra/{{ $user->id }}" method="POST">
                @method('PUT')
                @csrf
                    <div class="form-group">
                        <input type="text" class="form-control input-default" name="name"  value="{{ $user->name }}" placeholder="input-default">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-default" name="email"  value="{{ $user->email }}" placeholder="input-rounded">
                    </div>
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="10" name="alamat" class="form-control input-default">{{ $user->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="latitude" value="{{ $user->latitude }}" placeholder="input-rounded">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="longitude" value="{{ $user->longitude }}" placeholder="input-rounded">
                    </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="/admin/mitra"><< Kembali</a>
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
    </div>
</div>
<div class="col-lg-6">
    
</div>

  
</x-app-layout-admin>