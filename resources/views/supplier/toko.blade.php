@extends('supplier/menu')
    @section('konten')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Form -->
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">table Toko</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Toko</th>
                                <th>Nama Produk</th>
                                <th>Quantity</th>
                                <th>Tanggal Pemesanan</th>
                                <th>tanggal pengiriman</th>
                                <th>pesan diterima</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Toko</th>
                                <th>Nama Produk</th>
                                <th>Quantity</th>
                                <th>Tanggal Pemesanan</th>
                                <th>tanggal pengiriman</th>
                                <th>pesan diterima</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Tiger Nixon</td>
                                <td>$1.320,800</td>
                                <td>61</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Garrett Winters</td>
                                <td>$1.320,800</td>
                                <td>63</td>
                                <td>61</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>Ashton Cox</td>
                                <td>$1.320,800</td>
                                <td>66</td>
                                <td>61</td>
                                <td>2009/01/12</td>
                                <td>$86,000</td>
                            </tr>
                        
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