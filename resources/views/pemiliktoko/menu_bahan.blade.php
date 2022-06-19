@extends('pemiliktoko/menu')
    @section('konten')

    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Bahan</h6>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nama Pemilik</th>
                                <th>Nama Usaha</th>
                                <th>Alamat Usaha</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
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
