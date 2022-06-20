@extends('pemiliktoko/menu')
    @section('konten')


<div class="container-fluid">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <form class="form-horizontal" id="form_order" role="form">
            <div class="form-group row">
              <div class="col">
                <input class="form-control reset border-primary" id="search"  name="search" type="text" placeholder="Cari Barcode atau Nama" >
              </div>
            </div>
            
            <input type="hidden" class="reset"  id="product_id" name="product_id">
            <input type="hidden" class="reset" id="val_selling_price" name="selling_price">
            <input type="hidden" class="reset" id="val_product_name" name="product_name">
            <input type="hidden" class="reset" id="val_product_qty" name="stock_product_qty">

            <input type="hidden" class="reset" id="jenis_promo" name="jenis_promo">
            <input type="hidden" class="reset" id="potongan" name="potongan">
            <input type="hidden" class="reset" id="harga_potongan" name="harga_potongan">
            <input type="hidden" class="reset" name="total" id="val_total" value="<?= $this->cart->total() ?>">
            <input type="hidden" class="reset" id="kembali" readonly="" name="kembali"  >
            
            <div class="card" style="">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-4">
                      <div class="d-flex justify-content-between">
                        <div class="">Nama</div>
                        <div class="">:</div>
                      </div>
                    </div>
                    <div class="col-8" id="product_name"></div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-4">
                      <div class="d-flex justify-content-between">
                        <div class="">Stok</div>
                        <div class="">:</div>
                      </div>
                    </div>
                    <div class="col-8" id="product_stock"></div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-4">
                      <div class="d-flex justify-content-between">
                        <div class="">Harga</div>
                        <div class="">:</div>
                      </div>
                    </div>
                    <div class="col-8" id="selling_price"></div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-4">
                      <div class="d-flex justify-content-between">
                        <div class="">Qty</div>
                        <div class="">:</div>
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="form-group row">
                        <div class="col">
                          <input class="form-control reset border-warning" type="number" oninput="subTotal(this.value)" id="product_qty" min="0" name="product_qty" placeholder="0">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-4">
                      <div class="d-flex justify-content-between">
                        <div class="">Sub Total</div>
                        <div class="">:</div>
                      </div>
                    </div>
                    <div class="col-8" id="sub_total"></div>
                  </div>
                </li>
              </ul>
            </div>
          </form>

          <button type="button" class="btn btn-primary mb-2 mt-2" id="tambah" disabled="disabled" onclick="save_to_cart()"><i class="fa fa-shopping-cart"></i> Masuk Keranjang</button>
          
          <div class="form-group row">
            <div class="col">
              <label class="col-md-3 col-form-label">Bayar</label>
              <input class="form-control form-control-lg border-warning" type="number" id="bayar" name="bayar" oninput="showKembali(this.value)"  placeholder="0">
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-8">
          <h1 class="">
            <div class="d-flex justify-content-between">
              <div class="">Total : </div>
              <div class="d-flex">
                <div class="">Rp. </div>
                <div class="text-danger" id="total_belanja">
                  <?= number_format($this->cart->total(), 0, '', '.') ?>
                </div>
              </div>
            </div>
          </h1>
          <h1 class="">
            <div class="d-flex justify-content-between">
              <div class="">Bayar : </div>
              <div class="d-flex">
                <div class="">Rp. </div>
                <div class="text-danger" id="total_bayar">0</div>
              </div>
            </div>
          </h1>
          <h1 class="">
            <div class="d-flex justify-content-between">
              <div class="">Kembali : </div>
              <div class="d-flex">
                <div class="">Rp. </div>
                <div class="text-danger" id="total_kembali">0</div>
              </div>
            </div>
          </h1>
          <table id="shoping_cart_table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
              <tr>
                <th>no</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Sub total</th>
                <th>opsi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          <button type="button" class="btn btn-md btn-primary" id="selesai" disabled="disabled" onclick="preview_struck()" >Selesai Transaksi</button>
        </div>
      </div>
    </div>
  </div>

  @endsection