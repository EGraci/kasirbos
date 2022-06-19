@extends('pemiliktoko/menu')
    @section('konten')

    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">tambah menu</h6>
            </div>
            <div class="card-body">
                <form action="/restaurant/menu" method="POST">
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
                    {{-- <div class="form-group">
                      <label>Gambar Menu</label>
                      <input type="file" class="form-control-file" name="gambar">
                      @error('gambar')
                        <div class="invalid-feedback d-block">
                          {{$message}}
                        </div>
                       @enderror
                    </div>                     --}}
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
                                <th>Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $data)                                
                            <tr>
                                <th>{{$data->kd_menu}}</th>
                                <th>{{$data->nama_menu}}</th>
                                <th>{{$data->harga_menu}}</th>
                                <th><a href="/restaurant/menu/{{$data->kd_menu}}">Ubah</a></th>
                                <th><a href="/restaurant/produk/{{$data->kd_menu}}">Lihat</a></th>
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
