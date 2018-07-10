<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Film <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Judul Film <?php echo form_error('judul_film') ?></label>
            <input type="text" class="form-control" name="judul_film" id="judul_film" placeholder="Judul Film" value="<?php echo $judul_film; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tahun Produksi <?php echo form_error('tahun_produksi') ?></label>
            <input type="text" class="form-control" name="tahun_produksi" id="tahun_produksi" placeholder="Tahun Produksi" value="<?php echo $tahun_produksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="sinopsis">Sinopsis <?php echo form_error('sinopsis') ?></label>
            <textarea class="form-control" rows="3" name="sinopsis" id="sinopsis" placeholder="Sinopsis"><?php echo $sinopsis; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Durasi <?php echo form_error('durasi') ?></label>
            <input type="text" class="form-control" name="durasi" id="durasi" placeholder="Durasi" value="<?php echo $durasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Mulai <?php echo form_error('tanggal_mulai') ?></label>
            <input type="text" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Tanggal Mulai" value="<?php echo $tanggal_mulai; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Selesai <?php echo form_error('tanggal_selesai') ?></label>
            <input type="text" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo $tanggal_selesai; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Url Gambar <?php echo form_error('url_gambar') ?></label>
            <input type="text" class="form-control" name="url_gambar" id="url_gambar" placeholder="Url Gambar" value="<?php echo $url_gambar; ?>" />
        </div>
	    <input type="hidden" name="id_film" value="<?php echo $id_film; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('film') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>