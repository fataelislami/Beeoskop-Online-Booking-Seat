<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                      <h4 class="card-title">Data Film</h4>
                      <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                  </div>
                  <div class="col-md-6 text-right">
                      <?php echo anchor(site_url('admin/film/tambah'), '+ Tambah Film', 'class="btn btn-primary"'); ?>
      	    </div>
              </div>


                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Judul Film</th>
                                <th>Tahun Produksi</th>
                                <th>Durasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($datafilm as $d): ?>
                            <tr>
                                <td><?php echo $d->id_film ?></td>
                                <td><?php echo $d->judul_film ?></td>
                                <td><?php echo $d->tahun_produksi ?></td>
                                <td><?php echo $d->durasi ?></td>
                                <td>
                                    <a href="#">
                                        <button class="btn btn-success waves-effect waves-light m-r-10">Edit</button>
                                    </a>
                                    <a href="#">
                                      <button class="btn btn-danger waves-effect waves-light m-r-10" >Delete</button>
                                    </a>
                                </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
