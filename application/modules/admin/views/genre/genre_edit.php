<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Genre</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_genre</label>
                    <input type="text" name="id_genre" class="form-control" placeholder="" value="<?php echo $dataedit->id_genre?>" readonly>
            </div>
	  <div class="form-group">
            <label>nama_genre</label>
            <input type="text" name="nama_genre" class="form-control" value="<?php echo $dataedit->nama_genre?>">
    </div>
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
