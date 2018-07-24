<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                      <h4 class="card-title">Data Tiket</h4>
                      <h6 class="card-subtitle">Pengelolaan Data Tiket</h6>
                  </div>
                  <div class="col-md-6 text-right">
                      <?php echo anchor(site_url(), '+ Pesan Tiket', 'class="btn btn-primary"'); ?>
      	    </div>
              </div>


                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>no tiket</th>
                                <th>no transaksi</th>
                                <th>film</th>
                                <th>studio</th>
                                <th>jam tayang</th>
                                <th>tanggal tayang</th>
                                <th>No Kursi</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($datatiket as $d): ?>
                            <tr>
                                <td><?php echo $d->id_tiket; ?></td>
                                <td><?php echo $d->id_transaksi; ?></td>
                                <td><?php echo $d->judul_film; ?></td>
                                <td><?php echo $d->nama_studio; ?></td>
                                <td><?php echo $d->jam_tayang; ?></td>
                                <td><?php echo $d->tanggal_tayang; ?></td>
                                <td><?php echo "B".$d->no_baris." K".$d->no_kursi ?></td>
                                <td>
                                    <a href="<?php echo base_url().$module?>/tiket/delete/<?php echo $d->id_tiket ?>">
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
