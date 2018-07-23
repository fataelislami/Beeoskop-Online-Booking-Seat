<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Transaksi</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
            <label>tanggal_bayar</label>
            <input type="text" name="tanggal_bayar" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>total</label>
            <input type="text" name="total" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>jumlah_tiket</label>
            <input type="text" name="jumlah_tiket" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>status</label>
            <input type="text" name="status" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>username</label>
            <input type="text" name="username" class="form-control" placeholder="">
    </div>
	    <input type="hidden" name="id_transaksi" /> 
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
