<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
<div class="row">
<div class="col-md-12">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>nama</th>
        <th>alamat</th>
        <th>umur</th>
      </tr>
    </thead>
    <tbody id="table-body">

    </tbody>
    <tr>
      <form class="form-group">
        <td> <input type="text" id="nama" class="nama" name="nama" value=""> </td>
        <td> <input type="text" id="alamat" name="alamat" value=""> </td>
        <td> <input type="text" id="umur" name="umur" value=""> </td>
        <td> <button type="button" id="btn1" class="btn btn-primary" name="button">TAMBAH</button></td>

      </form>
    </tr>
   <button type="button" id="btnTest" class="btn btn-primary" name="button">TEST</button>


  </table>
</div>
</div>
    </div>

  </body>
  <?php $this->load->view('belajar/script'); ?>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" charset="utf-8"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.bundle.min.js" charset="utf-8"></script>
</html>
