<?php if($this->session->flashdata('flashMessage')) {
  $flashMessage=$this->session->flashdata('flashMessage');
echo "<script>alert('$flashMessage')</script>";
 } ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                      <h4 class="card-title">Data Konfirmasi</h4>
                      <h6 class="card-subtitle">Pengelolaan Data Konfirmasi</h6>
                  </div>
                  <div class="col-md-6 text-right">
      	    </div>
              </div>


                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id_transaksi</th>
                                <th>username</th>
                                <th>jumlah pembayaran</th>
                                <th>tanggal pembayaran</th>
                                <th>no rekening pelanggan</th>
                                <th>bank tujuan</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($datakonfirmasi as $d): ?>
                            <tr>
                                <td><?php echo $d->id_transaksi ?></td>
                                <td><?php echo $d->username ?></td>
                                <td><?php echo $d->jumlah_pembayaran ?></td>
                                <td><?php echo $d->tanggal_pembayaran ?></td>
                                <td><?php echo $d->no_rekening ?></td>
                                <td><?php echo $d->bank_tujuan ?></td>

                                <td>
                                  <a href="<?php echo base_url().$module?>/konfirmasi/read/<?php echo $d->id_konfirmasi ?>">
                                          <button class="btn btn-success waves-effect waves-light m-r-10">Lihat</button>
                                      </a>
                                <a href="<?php echo base_url().$module?>/konfirmasi/edit/<?php echo $d->id_konfirmasi ?>">
                                        <button class="btn btn-success waves-effect waves-light m-r-10">Edit</button>
                                    </a>
                                    <a href="<?php echo base_url().$module?>/konfirmasi/delete/<?php echo $d->id_konfirmasi ?>">
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
