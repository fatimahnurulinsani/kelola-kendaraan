  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Transaksi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h3 class="heading left-align">Input Data</h3>
                <div class="headul left-align"></div>
                <div class="row">
                  <form action='<?php echo base_url('admin/transaksi/update/'.$transaksi[0]['id_transaksi']); ?>' method='post'>
                      <h4 class="col-md-12">Data Transaksi</h4>
                      <div class='col-xs-6'>
                          <label>Kendaraan</label>
                          <select name="id_kendaraan" class="form-control" required="true">
                            <?php foreach ($kendaraan_qset as $k) { ?>
                              <option <?php if ($k['id_kendaraan'] == $transaksi[0]['id_kendaraan']){ ?> selected <?php } ?> value="<?php echo $k['id_kendaraan']; ?>"><?php echo $k['merk']; ?> - <?php echo $k['no_polisi']; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <div class='col-xs-6'>
                          <label>Supir</label>
                          <select name="id_supir" class="form-control" required="true">
                            <?php foreach ($supir_qset as $s) { ?>
                              <option <?php if ($s['id_supir'] == $transaksi[0]['id_supir']){ ?> selected <?php } ?> value="<?php echo $s['id_supir']; ?>"><?php echo $s['nama']; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <div class='col-xs-6'>
                          <label>Tanggal</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal" class="form-control pull-right" id="datetimepicker" required="true" value="<?php echo $transaksi[0]['tanggal'] ?>">
                          </div>
                      </div>
                      <div class='col-xs-6'>
                          <label>Status</label>
                          <select name="status" class="form-control" required="true">
                            <option <?php if ($transaksi[0]['status'] == "MASUK"){ ?> selected <?php } ?> value="MASUK">MASUK</option>
                            <option <?php if ($transaksi[0]['status'] == "KELUAR"){ ?> selected <?php } ?> value="KELUAR">KELUAR</option>
                          </select>
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