@extends('admin/menu')
    @section('konten')
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
                <h6 class="m-0 font-weight-bold text-primary">tambah menu</h6>
            </div>
            <div class="card-body">
                <form action="/admin/restaurant/{{$resto}}/menu" method="POST">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Nama Menu</label>
                        <input type="text" class="form-control @error('menu') is-invalid @enderror" value="{{old('menu')}}" name="menu" placeholder="Nama Menu" required>
                        @error('menu')
                        <div class="invalid-feedback d-block">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label>Harga Menu</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" value="{{old('harga')}}" name="harga" placeholder="Harga Menu" required>
                        @error('harga')
                        <div class="invalid-feedback d-block">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Gambar Menu</label>
                      <input type="file" class="form-control-file" name="gambar">
                      @error('gambar')
                        <div class="invalid-feedback d-block">
                          {{$message}}
                        </div>
                       @enderror
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
                                <th>Nama Menu</th>
                                <th>Harga Menu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $data)                                
                            <tr>
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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bahan as $data)                                
                            <tr>
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
    @endsection
    