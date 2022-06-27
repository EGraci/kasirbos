@extends('pemiliktoko/menu')
    @section('konten')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Keranjang Penjualan</h3>
						<br>
						{{-- <div class="alert alert-success">
							<p>Edit Data Berhasil !</p>
						</div> --}}
						{{-- <div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div> --}}
						<div class="col-sm-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4><i class="fa fa-list"></i> Menu</h4>
								</div>
								<div class="panel-body">
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
								  <form action="/restaurant/kasir" method="post">
									@csrf
									<input type="hidden" value="{{$data->kd_menu}}" name="kd_menu">
									<input name="aksi" value="tambah" type="hidden">
								  <th>{{$data->nama_menu}}</th>
                                  <th>{{$data->harga_menu}}</th>
                                  <th><button type="submit">Tambah</button></th>
								  </form>
                              </tr>
                              @endforeach                     
                          </tbody>
                      </table>
                  </div>
									
								</div>
							</div>
						</div>
						

						<div class="col-sm-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4><i class="fa fa-shopping-cart"></i> Nota {{$id}}
									</h4>
								</div>
								<div class="panel-body">
									<div id="keranjang">
										<table class="table table-bordered" id="example1">
											<thead>
												<tr>
													<td> Nama Menu</td>
													<td style="width:10%;"> Jumlah</td>
													<td style="width:20%;"> Total</td>
													<td> Aksi</td>
												</tr>
											</thead>
											<tbody>
												@foreach($nota as $data)
												<tr>
													<td>{{$data->nama_menu}}
														<!-- aksi ke table penjualan -->
														<form method="POST" action="/restaurant/kasir">
														@csrf
														<input name="aksi" value="pesan" type="hidden">
														<input type="hidden" name="id_nota" value="{{$id}}" class="form-control">
														<input type="hidden" name="id_menu" value="{{$data->kd_menu}}" class="form-control">
													</td>
													<td>Rp.{{$data->qty * $data->harga_menu}}</td>
													<td><input type="number" name="qty" value="{{$data->qty}}" class="form-control"></td>
													<td>
														<button type="submit" class="btn btn-warning">Update</button>
												    </form>
												    <!-- aksi ke table penjualan -->
														<a href="/restaurant/kasir/{{$data->kd_menu}}"  class="btn btn-danger"><i class="fa fa-times"></i>
														</a>
													</td>
												</tr>
												@endforeach
											</tbody>
									</table>
									<br/>
									<div id="kasirnya">
										<table class="table table-stripped">
												<tr>
													<td>Total Semua  </td>
													<td><input type="text" class="form-control" name="total" value=""></td>
												
													<td>Bayar  </td>
													<td><input type="text" class="form-control" name="bayar" value=""></td>
													<td><button class="btn btn-success"><i class="fa fa-shopping-cart"></i> Bayar</button>
													</td>
												</tr>
											</form>
											<!-- aksi ke table nota -->
											<tr>
												<td>Kembali</td>
												<td><input type="text" class="form-control" value=""></td>
												<td></td>
												<td>
													
												</td>

											</tr>
										</table>
										<br/>
										<br/>
									</div>
								</div>
							</div>
						</div>
				  </div>
              </div>
          </section>
      </section>  
         <!-- Page level plugins -->
         <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}} "></script>
         <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}} "></script>
         <!-- Page level custom scripts -->
         <script src="{{asset('js/demo/datatables-demo.js')}} "></script>  
@endsection