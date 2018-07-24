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
                      <h4 class="card-title">Manage Users</h4>
                      <h6 class="card-subtitle">Pengelolaan Data User</h6>
                  </div>
                  <div class="col-md-6 text-right">
                      <?php echo anchor(site_url('admin/users/create'), '+ Tambah User', 'class="btn btn-primary"'); ?>
      	    </div>
              </div>


                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1</td>
                                <td>
                                    contohusername</td>
                                <td>
                                    contoh nama</td>
                                <td>
                                    contoh email</td>
                                <td>
                                    level</td>
                                <td>
                                    <a href="#">
                                        <button class="btn btn-success waves-effect waves-light m-r-10">Edit</button>
                                    </a>
                                    <a href="#">
                                      <button class="btn btn-danger waves-effect waves-light m-r-10" >Delete</button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
