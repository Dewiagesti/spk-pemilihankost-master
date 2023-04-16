@extends('layouts.app')

@section('content')
<div class="untree_co-section">
    <div class="container">
      <div class="row align-items-stretch">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <!-- /.untree_co-testimonial -->
            <div class="card">
                <div class="card-header"><h5>Perhitungan</h5></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Jenis indeKos</label>
                        <select name="" id="" class="form-control">
                            <option value="">Pilih salah satu</option>
                            <option value="0">Laki-laki</option>
                            <option value="1">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga indeKos</label>
                        <select name="" id="" class="form-control">
                        <option value="" >Pilih salah satu</option>
                            <option value="0">Laki-laki</option>
                            <option value="1">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jarak indeKos</label>
                        <select name="" id="" class="form-control">
                        <option value="">Pilih salah satu</option>
                            <option value="0">Laki-laki</option>
                            <option value="1">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Hitung</button>
                    </div>
                </div>
            </div>
        </div> <!-- /.col-lg-4 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->  
  </div> 
@endsection