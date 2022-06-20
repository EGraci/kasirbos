@extends('pemiliktoko/menu')
    @section('konten')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bahan Menu {{$menu->nama_menu}} </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Bahan</th>
                                <th>Qty(Gram)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bahan as $data)                            
                                <form action="/restaurant/produk" method="post">
                                @csrf
                                @php
                                 if(DB::table('produk')->where([['kd_bahan', '=', $data->kd_bahan], ['kd_menu', '=', $menu->kd_menu]])->count() == 0){
                                    $qty = '0.00';
                                 }else{
                                    $qty = DB::table('produk')->where([['kd_bahan', '=', $data->kd_bahan], ['kd_menu', '=', $menu->kd_menu]])->first();
                                    $qty = $qty->qty;
                                }   
                                
                                @endphp
                                <tr>
                                    <input type="hidden" name="menu" value="{{$menu->kd_menu}}">
                                    <input type="hidden" name="bahan" value="{{$data->kd_bahan}}">
                                    <th>{{$data->nama_barang}}</th>
                                    <th><input type="text" name="qty" value="{{$qty}}"></th>
                                    <th><button type="submit" class="btn btn-primary">Simpan</button></th>
                                </tr>
                                </form>
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
    