  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supir
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Supir</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h3 class="heading left-align">Input Data</h3>
                <div class="headul left-align"></div>
                <div class="row">
                  <form action='<?php echo base_url('admin/supir/save'); ?>' method='post'>
                      <h4 class="col-md-12">Data Supir</h4>
                      <div class='col-xs-6'>
                          <label>Kode</label>
                          <input type='text' placeholder='Kode' name="kode" class='form-control' required="true">
                      </div>
                      <div class='col-xs-6'>
                          <label>Nama</label>
                          <input type='text' placeholder='Nama' name="nama" class='form-control' required="true">
                      </div>
                      <div class='col-xs-6'>
                          <label>No Ktp</label>
                          <input type='text' placeholder='No Ktp' name="no_ktp" class='form-control' required="true">
                      </div>
                      <div class='col-xs-6'>
                          <label>No Hp</label>
                          <input type='text' placeholder='No Hp' name="no_hp" class='form-control' required="true">
                      </div>
                      <div class='col-xs-6'>
                          <label>Alamat</label>
                          <textarea placeholder='Alamat' name="alamat" class='form-control' required="true"></textarea>
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