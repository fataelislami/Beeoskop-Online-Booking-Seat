<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah User</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
              <div class="form-group">
                              <label>username</label>
                              <input type="text" name="username" class="form-control" placeholder="">
                      </div>
	  <div class="form-group">
            <label>password</label>
            <input type="text" name="password" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>nama</label>
            <input type="text" name="nama" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>jenis_kelamin</label>
            <input type="text" name="jenis_kelamin" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>tanggal_lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>email</label>
            <input type="text" name="email" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>kota</label>
            <input type="text" name="kota" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>id_level</label>
            <input type="text" name="id_level" class="form-control" placeholder="">
    </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
