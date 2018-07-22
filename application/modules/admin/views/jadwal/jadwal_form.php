<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Jadwal</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
            <label>Studio</label>
            <select class="form-control" name="id_studio" id="id_studio">
            </select>
    </div>
    <div class="form-group">
            <label>Judul Film</label>
            <select class="form-control" name="id_film" id="id_film">
            </select>
    </div>
    <div class="form-group">
            <label>Jam Tayang</label>
            <select class="form-control" name="id_jam_tayang" id="id_jam_tayang">
            </select>
    </div>
	    <input type="hidden" name="id_jadwal" />

                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
