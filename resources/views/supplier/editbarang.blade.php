@extends('supplier/menu')
    @section('konten')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <!-- Form -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Barang</h6>
            </div>
            <div class="card-body">
                <form action="/supplier/barang/{{$view['id_supplier']}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$view['id_supplier']}}">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Produk</label>
                        <input type="text" class="form-control" id="inputEmail4" name="produk" value="{{$view['produk']}}" placeholder="Produk" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Harga maximum</label>
                        <input type="number" class="form-control" id="inputPassword4" name="max" value="{{$view['total']}}" placeholder="Harga Maximum" required>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Quantity</label>
                        <input type="number" class="form-control" id="inputAddress" name="qty" value="{{$view['qty']}}" placeholder="Quantity" required>
                      </div>
                    <div class="form-group">
                      <label for="inputAddress">pengiriman(day)</label>
                      <input type="number" class="form-control" id="inputAddress" name="estimasi" value="{{$view['perkiraan']}}" placeholder="pengiriman(day)" required>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">Denda</label>
                      <input type="number" class="form-control" id="inputAddress2" name="denda" value="{{$view['denda']}}" placeholder="Denda" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary col-md-12">Simpan</button>
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
                                <th>No</th>
                                <th>Produk</th>
                                <th>harga maximum</th>
                                <th>Quantity</th>
                                <th>pengiriman(day)</th>
                                <th>Denda</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0, $j=1; $i < $jml_supplier; $i++,$j++)
                            <tr>
                                <th>{{$j}}</th>
                                <td>{{$data_supplier[$i]['produk']}}</td>
                                <td>{{$data_supplier[$i]['total']}}</td>
                                <td>{{$data_supplier[$i]['qty']}}</td>
                                <td>{{$data_supplier[$i]['perkiraan']}}</td>
                                <td>{{$data_supplier[$i]['denda']}}</td>
                                <td><a href="/supplier/barang/{{$data_supplier[$i]['id_supplier']}}" class="btn btn-warning btn-circle btn-lg"><i class="fas fa-pen"></i></a></td>
                                <td><a href="/supplier/barang/delete/{{$data_supplier[$i]['id_supplier']}}" class="btn btn-danger btn-circle btn-lg"><i class="fas fa-trash"></i></a></td>

                            </tr>      
                            @endfor                  
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