  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengguna
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h3 class="heading left-align">Input Data</h3>
                <div class="headul left-align"></div>
                <div class="row">
                  <form action='<?php echo base_url('admin/data_pengguna/save'); ?>' method='post'>
                      <h4 class="col-md-12">Data Pengguna</h4>
                      <div class='col-xs-6'>
                          <label>Nama</label>
                          <input type='text' placeholder='Nama' name="nama_pengguna" class='form-control' required="true">
                      </div>
                      <div class='col-xs-6'>
                          <label>Password</label>
                          <input type='password' placeholder='Password' name="password" class='form-control' required="true">
                      </div>
                      <div class='col-xs-6'>
                          <label>Hak Akses</label>
                          <input type='text' placeholder='Hak Akses' name="hak_akses" class='form-control' required="true">
                      </div>
                      <div class='col-xs-6'>
                          <label>No HP</label>
                          <input type='text' placeholder='No HP' class='form-control' name="no_hp" required="true">
                      </div>
                      <div class='col-xs-12'>
                          <button type='submit' class='btn btn-primary enabled transition' id='save_btn'>Simpan</button>
                      </div>
                  </form>
                </div>
            </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->