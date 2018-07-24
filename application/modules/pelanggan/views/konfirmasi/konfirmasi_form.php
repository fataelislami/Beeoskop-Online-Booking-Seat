<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Konfirmasi</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>" enctype="multipart/form-data">
	  <div class="form-group">
            <label>id_transaksi</label>
            <input type="text" name="id_transaksi" class="form-control" value="<?php echo $id_transaksi ?>" readonly>
    </div>
	  <div class="form-group">
            <label>username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $this->session->userdata('username'); ?>" placeholder="" readonly>
    </div>
	  <div class="form-group">
            <label>nama</label>
            <input type="text" name="nama" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>jumlah_pembayaran</label>
            <input type="text" name="jumlah_pembayaran" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>tanggal_pembayaran</label>
            <input type="date" name="tanggal_pembayaran" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>bank_asal</label>
            <input type="text" name="bank_asal" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>no_rekening</label>
            <input type="text" name="no_rekening" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>atas_nama</label>
            <input type="text" name="atas_nama" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>bank_tujuan</label>
            <input type="text" name="bank_tujuan" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>foto</label>
            <input type="file" name="foto" class="form-control">
    </div>
	    <input type="hidden" name="id_konfirmasi" />

                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
