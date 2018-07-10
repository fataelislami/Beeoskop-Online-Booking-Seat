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
        <h2 style="margin-top:0px">Film Read</h2>
        <table class="table">
	    <tr><td>Judul Film</td><td><?php echo $judul_film; ?></td></tr>
	    <tr><td>Tahun Produksi</td><td><?php echo $tahun_produksi; ?></td></tr>
	    <tr><td>Sinopsis</td><td><?php echo $sinopsis; ?></td></tr>
	    <tr><td>Durasi</td><td><?php echo $durasi; ?></td></tr>
	    <tr><td>Tanggal Mulai</td><td><?php echo $tanggal_mulai; ?></td></tr>
	    <tr><td>Tanggal Selesai</td><td><?php echo $tanggal_selesai; ?></td></tr>
	    <tr><td>Url Gambar</td><td><?php echo $url_gambar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('film') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>