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
                                  <th>KD Menu</th>
                                  <th>Nama Menu</th>
                                  <th>Harga Menu</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($menu as $data)                                
                              <tr>
                                  <th>{{$data->kd_menu}}</th>
                                  <th>{{$data->nama_menu}}</th>
                                  <th>{{$data->harga_menu}}</th>
                                  <th><a href="{{$data->kd_menu}}">Ubah</a></th>
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
									<h4><i class="fa fa-shopping-cart"></i> KASIR
									<a class="btn btn-danger pull-right" 
										onclick="javascript:return confirm('Apakah anda ingin reset keranjang ?');" 
										style="margin-top:-0.5pc;" href="fungsi/hapus/hapus.php?penjualan=jual">
										<b>RESET KERANJANG</b></a>
									</h4>
								</div>
								<div class="panel-body">
									<div id="keranjang">
										<table class="table table-bordered" id="example1">
											<thead>
												<tr>
													<td> No</td>
													<td> Nama Barang</td>
													<td style="width:10%;"> Jumlah</td>
													<td style="width:20%;"> Total</td>
													<td> Kasir</td>
													<td> Aksi</td>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td></td>
													<td></td>
													<td>
                            <!-- aksi ke table penjualan -->
                            <form method="POST" action="fungsi/edit/edit.php?jual=jual">
														<input type="number" name="jumlah" value="" class="form-control">
														<input type="hidden" name="id" value="" class="form-control">
														<input type="hidden" name="id_barang" value="" class="form-control">
													</td>
													<td>Rp.0,-</td>
													<td></td>
													<td>
														<button type="submit" class="btn btn-warning">Update</button>
												    </form>
												    <!-- aksi ke table penjualan -->
														<a href="fungsi/hapus/hapus.php?jual=jual&id="  class="btn btn-danger"><i class="fa fa-times"></i>
														</a>
													</td>
												</tr>
											</tbody>
									</table>
									<br/>
									<div id="kasirnya">
										<table class="table table-stripped">
										
							
											<form method="POST" action="index.php?page=jual&nota=yes#kasirnya">
													<input type="hidden" name="id_barang[]" value="">
													<input type="hidden" name="id_member[]" value="">
													<input type="hidden" name="jumlah[]" value="">
													<input type="hidden" name="total1[]" value="">
													<input type="hidden" name="tgl_input[]" value="">
													<input type="hidden" name="periode[]" value="">
								
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