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
                            <option value="1">Putra</option>
                            <option value="2">Putri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga indeKos</label>
                        <select name="" id="" class="form-control">
                        <option value="" >Pilih salah satu</option>
                            <option value="1">200 - 300</option>
                            <option value="2">300 - 350</option>
                            <option value="3">350 - 400</option>
                            <option value="4">460 - 500</option>
                            <option value="5">>500</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jarak indeKos</label>
                        <select name="" id="" class="form-control">
                        <option value="">Pilih salah satu</option>
                            <option value="1">150m - 350m</option>
                            <option value="2">360m - 450m</option>
                            <option value="3">460m - 850m</option>
                            <option value="4">960m - 1km</option>
                            <option value="5">1km</option>
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