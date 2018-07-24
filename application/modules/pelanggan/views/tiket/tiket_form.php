<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Tiket</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
            <label>id_transaksi</label>
            <input type="text" name="id_transaksi" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>id_jadwal</label>
            <input type="text" name="id_jadwal" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>id_kursi</label>
            <input type="text" name="id_kursi" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>tanggal_tayang</label>
            <input type="date" name="tanggal_tayang" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>username</label>
            <input type="text" name="username" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>date_create</label>
            <input type="text" name="date_create" class="form-control" placeholder="">
    </div>
	    <input type="hidden" name="id_tiket" />

                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
