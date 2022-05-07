@extends('admin/menu')
    @section('konten')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Form -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">input akun</h6>
            </div>
            <div class="card-body">
                <form action="/admin/akun" method="POST">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Nama Pemilik</label>
                        <input type="text" class="form-control" name="pemilik" placeholder="Nama Pemilik" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Nama Usaha</label>
                        <input type="text" class="form-control" name="usaha" placeholder="Nama Usaha" required>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Username</label>
                          <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                      </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" id="inputAddress" name="alamat" placeholder="Alamat" required>
                      </div>
                    <div class="form-group">
                        <label>Telepom</label>
                        <input type="text" class="form-control" id="inputAddress" name="telepon" placeholder="Telepon" required>
                      </div>
                    <div class="form-group">
                      <label>SIUP</label>
                      <input type="file" class="form-control-file" name="siup">
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <select class="form-control" name="level">
                        <option value="2">Restaurant</option>
                        <option value="3">Supplier</option>
                      </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary col-md-12">Tambah</button>
                  </form>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">table barang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Pemilik</th>
                                <th>Nama Usaha</th>
                                <th>Alamat Usaha</th>
                                <th>Telepon</th>
                                <th>SIUP</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akun as $data)                                
                            <tr>
                                <th>{{$data->nama_pemilik}}</th>
                                <th>{{$data->nama_usaha}}</th>
                                <th>{{$data->alamat_usaha}}</th>
                                <th>{{$data->telepon}}</th>
                                <th>{{$data->siup}}</th>
                                @if ($data->level == 2)
                                <th>Restaurant</th>
                                @else
                                <th>Supplier</th>
                                @endif
                                <th><a href="/admin/akun/{{$data->username}}">Ubah</a></th>

                            </tr>
                            @endforeach                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
    </div>
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}} "></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}} "></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}} "></script>
    @endsection