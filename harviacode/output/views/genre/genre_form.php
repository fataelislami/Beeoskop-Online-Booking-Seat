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
        <h2 style="margin-top:0px">Genre <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Genre <?php echo form_error('nama_genre') ?></label>
            <input type="text" class="form-control" name="nama_genre" id="nama_genre" placeholder="Nama Genre" value="<?php echo $nama_genre; ?>" />
        </div>
	    <input type="hidden" name="id_genre" value="<?php echo $id_genre; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('genre') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>