@extends('pemiliktoko/menu')
    @section('konten')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">tambah bahan</h6>
            </div>
            <div class="card-body">
                <form action="/restaurant/bahan/{{$kd}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control @error('barang') is-invalid @enderror" value="{{$old->nama_barang}}" name="barang" placeholder="Nama Barang" required>
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
                            <input type="text" class="form-control @error('qty') is-invalid @enderror" value="{{$old->qty}}" name="qty" placeholder="Qty" required>
                            @error('qty')
                            <div class="invalid-feedback d-block">
                            {{$message}}
                            </div>
                            @enderror
                      </div>
                      <div class="form-group  col-md-6">
                            <select class="form-control" name="berat">
                                <option value="1" selected>Gram</option>
                                @foreach($berat as $data)
                                    @if("Gram" != $data->berat)
                                    <option value="{{$data->kd_berat}}">{{$data->berat}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary col-md-5" value="simpan">Simpan</button>
                        <button type="submit" name="submit" class="btn btn-danger col-md-5" value="hapus">hapus</button>
                    </div>
                  </form>
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
                                <th><a href="/restaurant/bahan/{{$data->kd_bahan}}">Ubah</a></th>
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
