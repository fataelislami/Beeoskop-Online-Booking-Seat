<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Jadwal</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_jadwal</label>
                    <input type="text" name="id_jadwal" class="form-control" placeholder="" value="<?php echo $dataedit->id_jadwal?>" readonly>
            </div>
	  <div class="form-group">
            <label>id_studio</label>
            <input type="text" name="id_studio" class="form-control" value="<?php echo $dataedit->id_studio?>">
    </div>
	  <div class="form-group">
            <label>id_film</label>
            <input type="text" name="id_film" class="form-control" value="<?php echo $dataedit->id_film?>">
    </div>
	  <div class="form-group">
            <label>id_jam_tayang</label>
            <input type="text" name="id_jam_tayang" class="form-control" value="<?php echo $dataedit->id_jam_tayang?>">
    </div>
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
