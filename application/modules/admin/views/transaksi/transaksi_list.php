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
                      <h4 class="card-title">Data Transaksi</h4>
                      <h6 class="card-subtitle">Pengelolaan Data Transaksi</h6>
                  </div>
                  <div class="col-md-6 text-right">
      	    </div>
              </div>


                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <?php foreach ($datafield as $d): ?>
                                  <th><?php echo str_replace("_"," ",$d) ?></th>
                                <?php endforeach; ?>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($datatransaksi as $d): ?>
                            <tr>
                              <?php foreach ($datafield as $df): ?>
                                <td><?php echo $d->$df ?></td>
                              <?php endforeach; ?>
                                <td>
                                <a href="<?php echo base_url().$module?>/transaksi/edit/<?php echo $d->id_transaksi ?>">
                                        <button class="btn btn-success waves-effect waves-light m-r-10">Edit</button>
                                    </a>
                                    <a href="<?php echo base_url().$module?>/transaksi/delete/<?php echo $d->id_transaksi ?>">
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
