@extends('supplier/menu')
    @section('konten')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
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
                                <th>Ubah</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>No</td>
                                <td>Produk</td>
                                <td>harga maximum</td>
                                <td>Quantity</td>
                                <td>pengiriman(day)</td>
                                <td>Denda</td>
                                <td>Ubah</td>
                                <td>Hapus</td>
                            </tr>
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