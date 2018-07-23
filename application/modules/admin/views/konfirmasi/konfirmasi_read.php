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
            <input type="text" name="id_transaksi" class="form-control" value="<?php echo $dataedit->id_transaksi?>" readonly>
    </div>
	  <div class="form-group">
            <label>username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $dataedit->username?>" readonly>
    </div>
	  <div class="form-group">
            <label>nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $dataedit->nama?>" readonly>
    </div>
	  <div class="form-group">
            <label>jumlah_pembayaran</label>
            <input type="text" name="jumlah_pembayaran" class="form-control" value="<?php echo $dataedit->jumlah_pembayaran?>" readonly>
    </div>
	  <div class="form-group">
            <label>tanggal_pembayaran</label>
            <input type="text" name="tanggal_pembayaran" class="form-control" value="<?php echo $dataedit->tanggal_pembayaran?>" readonly>
    </div>
	  <div class="form-group">
            <label>bank_asal</label>
            <input type="text" name="bank_asal" class="form-control" value="<?php echo $dataedit->bank_asal?>" readonly>
    </div>
	  <div class="form-group">
            <label>no_rekening</label>
            <input type="text" name="no_rekening" class="form-control" value="<?php echo $dataedit->no_rekening?>" readonly>
    </div>
	  <div class="form-group">
            <label>atas_nama</label>
            <input type="text" name="atas_nama" class="form-control" value="<?php echo $dataedit->atas_nama?>" readonly>
    </div>
	  <div class="form-group">
            <label>bank_tujuan</label>
            <input type="text" name="bank_tujuan" class="form-control" value="<?php echo $dataedit->bank_tujuan?>" readonly>
    </div>
	  <div class="form-group">
            <label>foto</label>
            <img id="myImg" width="300" src="<?php echo base_url() ?>assets/bukti-pembayaran/<?php echo $dataedit->foto?>" alt="">
    </div>

            </form>
        </div>
    </div>
  </div>
</div>
<div id="myModal" class="modal">
  <img class="modal-content" id="img01">
  <span class="close">&times;</span>
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal

jQuery(document).keypress(function(e) {
  if (e.keyCode == 27) {
    modal.style.display = "none";
  }
 });
</script>
