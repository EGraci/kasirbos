@extends('admin/menu')
    @section('konten')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Form -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">update akun</h6>
            </div>
            <div class="card-body">
                <form action="/admin/akun/do" method="POST">
                    @csrf
                    <input type="hidden" name="user" value="{{$old->id_user}}">
                    <input type="hidden" name="profile" value="{{$old->id_profile}}">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Nama Pemilik</label>
                        <input type="text" class="form-control @error('pemilik') is-invalid @enderror" value="{{$old->nama_pemilik}}" name="pemilik" placeholder="Nama Pemilik" required>
                        @error('pemilik')
                        <div class="invalid-feedback d-block">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label>Nama Usaha</label>
                        <input type="text" class="form-control @error('usaha') is-invalid @enderror" value="{{$old->nama_usaha}}" name="usaha" placeholder="Nama Usaha" required>
                        @error('usaha')
                        <div class="invalid-feedback d-block">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Username</label>
                          <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{$old->username}}" name="username" placeholder="Username" required>
                          @error('username')
                          <div class="invalid-feedback d-block">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>Password</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                          @error('password')
                          <div class="invalid-feedback d-block">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{$old->alamat_usaha}}" name="alamat" placeholder="Alamat" required>
                        @error('alamat')
                        <div class="invalid-feedback d-block">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" value="{{$old->telepon}}" name="telepon" placeholder="Telepon" required>
                        @error('telepon')
                        <div class="invalid-feedback d-block">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                    <div class="form-group">
                      <label>SIU</label>
                      <input type="file" class="form-control-file" name="siup">
                      @error('siup')
                        <div class="invalid-feedback d-block">
                          {{$message}}
                        </div>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <select class="form-control" name="level">
                        @if(old('level') == 2 || $old->level == 2)
                        <option value="2" selected>Restaurant</option>
                        @else
                        <option value="2">Restaurant</option>
                        @endif
                        @if (old('level') == 3 || $old->level == 3)
                        <option value="3" selected>Supplier</option>
                        @else
                        <option value="3">Supplier</option>
                        @endif
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary col-md-5" value="simpan">Simpan</button>
                      <button type="submit" name="submit" class="btn btn-danger col-md-5" value="hapus">hapus</button>
                    </div>
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
                                <th>SIU</th>
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