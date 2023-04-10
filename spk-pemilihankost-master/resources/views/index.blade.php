 {{-- CONTOH HALAMAN  --}}
<x-app-layout>
    @section('content')
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                {{-- TARUK TAMPILAN DISINI --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Mitra</h4>
                    </div>
                    <div class="card-body">
                    <button type="button" class="btn btn-primary">Tambah data</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nama Indekos</th>
                                        <th>Alamat</th>
                                        <th>Jenis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="javascript:void(0)">Order #26589</a>
                                        </td>
                                        <td>Herman Beck</td>
                                        <td>Oct 16, 2017</td>
                                        <td>$45.00</td>
                                        <td>Paid</td>
                                        <td><span class="badge badge-success">Hapus</td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <div class="card-header">
            </div>
        </div>
    @endsection
</x-app-layout>
