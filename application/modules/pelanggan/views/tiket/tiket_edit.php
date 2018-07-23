<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Tiket</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_tiket</label>
                    <input type="text" name="id_tiket" class="form-control" placeholder="" value="<?php echo $dataedit->id_tiket?>" readonly>
            </div>
	  <div class="form-group">
            <label>id_transaksi</label>
            <input type="text" name="id_transaksi" class="form-control" value="<?php echo $dataedit->id_transaksi?>">
    </div>
	  <div class="form-group">
            <label>id_jadwal</label>
            <input type="text" name="id_jadwal" class="form-control" value="<?php echo $dataedit->id_jadwal?>">
    </div>
	  <div class="form-group">
            <label>id_kursi</label>
            <input type="text" name="id_kursi" class="form-control" value="<?php echo $dataedit->id_kursi?>">
    </div>
	  <div class="form-group">
            <label>tanggal_tayang</label>
            <input type="text" name="tanggal_tayang" class="form-control" value="<?php echo $dataedit->tanggal_tayang?>">
    </div>
	  <div class="form-group">
            <label>username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $dataedit->username?>">
    </div>
	  <div class="form-group">
            <label>date_create</label>
            <input type="text" name="date_create" class="form-control" value="<?php echo $dataedit->date_create?>">
    </div>
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
