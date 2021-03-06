  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kendaraan
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Kendaraan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h3 class="heading left-align">Input Data</h3>
                <div class="headul left-align"></div>
                <div class="row">
                  <form action='<?php echo base_url('admin/kendaraan/update/'.$kendaraan[0]['id_kendaraan']); ?>' method='post'>
                      <h4 class="col-md-12">Data Kendaraan</h4>
                      <div class='col-xs-6'>
                          <label>Garasi</label>
                          <select name="id_garasi" class="form-control">
                            <?php foreach ($garasi_qset as $g) { ?>
                              <option <?php if ($g['id_garasi'] == $kendaraan[0]['id_garasi']){ ?> selected <?php } ?> value="<?php echo $g['id_garasi']; ?>"><?php echo $g['no_garasi']; ?> - <?php echo $g['jenis_garasi']; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <div class='col-xs-6'>
                          <label>No Mesin</label>
                          <input type='text' placeholder='No Mesin' name="no_mesin" class='form-control' required="true" value="<?php echo $kendaraan[0]['no_mesin'] ?>">
                      </div>
                      <div class='col-xs-6'>
                          <label>No Rangka</label>
                          <input type='text' placeholder='No Rangka' name="no_rangka" class='form-control' required="true" value="<?php echo $kendaraan[0]['no_rangka'] ?>">
                      </div>
                      <div class='col-xs-6'>
                          <label>No Polisi</label>
                          <input type='text' placeholder='No Polisi' name="no_polisi" class='form-control' required="true" value="<?php echo $kendaraan[0]['no_polisi'] ?>">
                      </div>
                      <div class='col-xs-6'>
                          <label>Merk</label>
                          <input type='text' placeholder='Merk' class='form-control' name="merk" required="true" value="<?php echo $kendaraan[0]['merk'] ?>">
                      </div>
                      <div class='col-xs-6'>
                          <label>Jenis Kendaraan</label>
                          <input type='text' placeholder='Jenis Kendaraan' class='form-control' name="jenis_kendaraan" required="true" value="<?php echo $kendaraan[0]['jenis_kendaraan'] ?>">
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