@extends('admin/menu')
    @section('konten')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="btn card bg-gradient-primary" href="/admin/restaurant/{{$resto}}/menu">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                                <div class="h5 mb-1 font-weight-bold text-uppercase text-light">
                                    Menu
                                </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="btn card bg-gradient-primary" href="/admin/restaurant/{{$resto}}/bahan">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                                <div class="h5 mb-1 font-weight-bold text-uppercase text-light">
                                    Bahan
                                </div>
                        </div>
                    </div>
                </a>
            </div>            
        </div>

        {{-- form  --}}

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">table menu</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>KD Menu</th>
                                <th>Nama Menu</th>
                                <th>Harga Menu</th>
                                <th>Aksi</th>
                                <th>Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $data)                                
                            <tr>
                                <th>{{$data->kd_menu}}</th>
                                <th>{{$data->nama_menu}}</th>
                                <th>{{$data->harga_menu}}</th>
                                <th><a href="/admin/restaurant/{{$resto}}/menu/{{$data->kd_menu}}">Ubah</a></th>
                                <th><a href="/admin/restaurant/{{$resto}}/produk/{{$data->kd_menu}}">Lihat</a></th>
                            </tr>
                            @endforeach                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">table bahan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>KD Bahan</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bahan as $data)                                
                            <tr>
                                <th>{{$data->kd_bahan}}</th>
                                <th>{{$data->nama_barang}}</th>
                                <th>{{$data->qty}}</th>
                                <th>{{$data->status}}</th>
                                <th><a href="/admin/restaurant/{{$resto}}/bahan/{{$data->kd_bahan}}">Ubah</a></th>
                            </tr>
                            @endforeach                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
      <!-- Page level plugins -->
      <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}} "></script>
      <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}} "></script>
      <!-- Page level custom scripts -->
      <script src="{{asset('js/demo/datatables-demo.js')}} "></script>
    @endsection
    