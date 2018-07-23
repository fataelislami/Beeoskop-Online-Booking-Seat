<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Konfirmasi</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_konfirmasi</label>
                    <input type="text" name="id_konfirmasi" class="form-control" placeholder="" value="<?php echo $dataedit->id_konfirmasi?>" readonly>
            </div>
	  <div class="form-group">
            <label>id_transaksi</label>
            <input type="text" name="id_transaksi" class="form-control" value="<?php echo $dataedit->id_transaksi?>">
    </div>
	  <div class="form-group">
            <label>username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $dataedit->username?>">
    </div>
	  <div class="form-group">
            <label>nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $dataedit->nama?>">
    </div>
	  <div class="form-group">
            <label>jumlah_pembayaran</label>
            <input type="text" name="jumlah_pembayaran" class="form-control" value="<?php echo $dataedit->jumlah_pembayaran?>">
    </div>
	  <div class="form-group">
            <label>tanggal_pembayaran</label>
            <input type="text" name="tanggal_pembayaran" class="form-control" value="<?php echo $dataedit->tanggal_pembayaran?>">
    </div>
	  <div class="form-group">
            <label>bank_asal</label>
            <input type="text" name="bank_asal" class="form-control" value="<?php echo $dataedit->bank_asal?>">
    </div>
	  <div class="form-group">
            <label>no_rekening</label>
            <input type="text" name="no_rekening" class="form-control" value="<?php echo $dataedit->no_rekening?>">
    </div>
	  <div class="form-group">
            <label>atas_nama</label>
            <input type="text" name="atas_nama" class="form-control" value="<?php echo $dataedit->atas_nama?>">
    </div>
	  <div class="form-group">
            <label>bank_tujuan</label>
            <input type="text" name="bank_tujuan" class="form-control" value="<?php echo $dataedit->bank_tujuan?>">
    </div>
	  <div class="form-group">
            <label>keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?php echo $dataedit->keterangan?>">
    </div>
	  <div class="form-group">
            <label>foto</label>
            <input type="text" name="foto" class="form-control" value="<?php echo $dataedit->foto?>">
    </div>
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
