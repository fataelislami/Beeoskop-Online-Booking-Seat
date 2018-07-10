<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="<?php echo base_url().$getProfile[0]->urlPhoto ?>" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10"><?php echo $getProfile[0]->name ?></h4>
                    <h6 class="card-subtitle">username : <?php echo $getProfile[0]->username  ?></h6>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                    </div>
                </center>
            </div>
            <div>
                <hr> </div>
            <div class="card-body"> <small class="text-muted">Email address </small>
                <h6><?php echo $getProfile[0]->email ?></h6> <small class="text-muted p-t-30 db">Address</small>
                <h6><?php echo $getProfile[0]->address; ?></h6>
                <div class="map-box">
                  <iframe
width="100%"
height="150"
frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC0VxtmcwCb8pE1NcqTggekTZgJZLEQIFk
  &q=<?php echo $getProfile[0]->address ?>" allowfullscreen>
</iframe>
                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                <br/>
                <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="settings" role="tabpanel">
                    <div class="card-body">
                        <form class="form-horizontal form-material" action="<?php echo base_url()?>admin/profile/updateaction" method="post">
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control form-control-line" value="<?php echo $getProfile[0]->name?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" name="email" placeholder="email@islamify.id" class="form-control form-control-line" id="example-email" value="<?php echo $getProfile[0]->email?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="Masukan Password Baru"name="password" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">address</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line" name="address"><?php echo $getProfile[0]->address?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="submit" name="submit" class="btn btn-success"value="Update Profile">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
