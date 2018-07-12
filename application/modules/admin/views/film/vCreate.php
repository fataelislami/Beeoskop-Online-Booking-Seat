<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Film</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url() ?>admin/film/create_action">
               <!-- //START -->
                <div class="form-group">
                        <label>Id Film</label>
                        <input type="text" name="id_film" class="form-control" placeholder="id_film">
                </div>
                <div class="form-group">
                        <label>Judul Film</label>
                        <input type="text" name="judul_film" class="form-control">
                </div>
                <div class="form-group">
                        <label>Tahun Produksi</label>
                        <input type="text" name="tahun_produksi" class="form-control">
                </div>
                <div class="form-group">
                        <label>Sinopsis</label>
                        <textarea name="sinopsis" rows="8" cols="80" class="form-control"></textarea>
                </div>
                <div class="form-group">
                        <label>Durasi</label>
                        <input type="text" name="durasi" class="form-control">
                </div>
                <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control">
                </div>
                <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control">
                </div>
                <div class="form-group">
                        <label>Url Poster</label>
                        <input type="text" name="url_gambar" class="form-control">
                </div>

              <!-- END -->
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
