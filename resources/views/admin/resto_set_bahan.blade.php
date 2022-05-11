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
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="btn card bg-gradient-primary" href="/admin/restaurant/{{$resto}}/produk">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                                <div class="h5 mb-1 font-weight-bold text-uppercase text-light">
                                    Produk
                                </div>
                        </div>
                    </div>
                </a>
            </div>
            
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">tambah bahan</h6>
            </div>
            <div class="card-body">
                <form action="/admin/restaurant/{{$resto}}/bahan" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control @error('barang') is-invalid @enderror" value="{{old('barang')}}" name="barang" placeholder="Nama Barang" required>
                        @error('barang')
                        <div class="invalid-feedback d-block">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Qty</label>
                        </div>
                      <div class="form-group col-md-6">
                            <input type="text" class="form-control @error('qty') is-invalid @enderror" value="{{old('qty')}}" name="qty" placeholder="Qty" required>
                            @error('qty')
                            <div class="invalid-feedback d-block">
                            {{$message}}
                            </div>
                            @enderror
                      </div>
                      <div class="form-group  col-md-6">
                            <select class="form-control" name="berat">
                                @foreach($berat as $data)
                                    @if(old('berat') == $data->berat)
                                    <option value="{{$data->kd_berat}}" selected>{{$data->berat}}</option>
                                    @else
                                    <option value="{{$data->kd_berat}}">{{$data->berat}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary col-md-12">Tambah</button>
                  </form>
            </div>
        </div>

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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $data)                                
                            <tr>
                                <th>{{$data->kd_menu}}</th>
                                <th>{{$data->nama_menu}}</th>
                                <th>{{$data->harga_menu}}</th>
                                <th><a href="/admin/restaurant/{{$resto}}/menu/{{$data->kd_menu}}">Ubah</a></th>
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
    