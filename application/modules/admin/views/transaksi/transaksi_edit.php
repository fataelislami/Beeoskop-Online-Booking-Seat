<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Transaksi</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_transaksi</label>
                    <input type="text" name="id_transaksi" class="form-control" placeholder="" value="<?php echo $dataedit->id_transaksi?>" readonly>
            </div>
	  <div class="form-group">
            <label>tanggal_bayar</label>
            <input type="date" name="tanggal_bayar" class="form-control" value="<?php echo $dataedit->tanggal_bayar?>" required>
    </div>
	  <div class="form-group">
            <label>total</label>
            <input type="text" name="total" class="form-control" value="<?php echo $dataedit->total?>">
    </div>
	  <div class="form-group">
            <label>jumlah_tiket</label>
            <input type="text" name="jumlah_tiket" class="form-control" value="<?php echo $dataedit->jumlah_tiket?>">
    </div>
	  <div class="form-group">
            <label>status</label>
            <select class="form-control" name="status">
              <option value="sukses" <?php if ($dataedit->status=='sukses') {echo "selected";} ?>>Sukses</option>
              <option value="pending"<?php if ($dataedit->status=='pending') {echo "selected";} ?>>Pending</option>
            </select>
    </div>
	  <div class="form-group">
            <label>username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $dataedit->username?>">
    </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
