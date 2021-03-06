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
                                  <th><button type="submit" <i class="fa fa-plus" aria-hidden="true"></i></button></th>
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
								<div class="panel-heading"> 
									<a class="btn btn-danger pull-right" data-toggle="modal" data-target="#resetModal"
										style="margin-top:-0.5pc;" href="#">
										<i class="fa fa-shopping-cart"> <b>RESET KERANJANG</b></i></a>
									</h4>
								</div>
								<div class="panel-body">
									<div id="keranjang">
										<table class="table table-bordered" id="example1">
											<thead>
												<tr>
													<td> Nama Menu</td>
													<td style="width:10%;"> Harga</td>
													<td style="width:20%;"> Total</td>
													<td> Aksi</td>
												</tr>
											</thead>
											<tbody>
												@php
													$total = 0;
												@endphp
												@foreach($nota as $data)
												<tr>
													<td>{{$data->nama_menu}}
														<!-- aksi ke table penjualan -->
														<form method="POST" action="/restaurant/kasir">
														@csrf
														<input name="aksi" value="pesan" type="hidden">
														<input type="hidden" name="kd_menu" value="{{$data->kd_menu}}" class="form-control">
													</td>
													<td>
														@php
														$total += $data->qty * $data->harga_menu;
														echo "Rp.".$data->qty * $data->harga_menu;
														@endphp
													</td>
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
													<form action="/restaurant/kasir" method="post">
													@csrf
													<input name="aksi" value="bayar" type="hidden">
													<td>Total Semua  </td>
													<td><input type="text" class="form-control" name="total" value="{{$total}}" readonly></td>
													<td>Bayar  </td>
													<td><input type="text" class="form-control" name="bayar" value="{{$bayar}}"></td>
													<td><button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Bayar</button>
													</td>
													
												</tr>
											</form>
											<!-- aksi ke table nota -->
											<tr>
												<td>Kembali</td>
												<td><input type="text" class="form-control" value="{{$kembali}}"></td>
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
	  	<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">??</span>
						</button>
					</div>
					<div class="modal-body">Apakah anda ingin reset keranjang ?</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="/restaurant/kasir/reset">reset</a>
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