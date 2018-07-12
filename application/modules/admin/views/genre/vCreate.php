<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Genre</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url() ?>admin/genre/create_action">
               <!-- //START -->
                <div class="form-group">
                        <label>Nama Genre</label>
                        <input type="text" name="nama_genre" class="form-control" placeholder="nama_genre">
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
