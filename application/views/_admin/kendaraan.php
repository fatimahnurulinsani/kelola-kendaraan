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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
              <a href="<?php echo base_url('admin/kendaraan/input'); ?>">
                <button class="btn btn-primary">Tambah</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Garasi</th>
                  <th>No Mesin</th>
                  <th>No Rangka</th>
                  <th>No Polisi</th>
                  <th>Merk</th>
                  <th>Jenis Kendaraan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($kendaraan_qset as $k){ ?>
                <tr>
                  <td><?php echo $k->no_garasi ?> - <?php echo $k->jenis_garasi ?></td>
                  <td><?php echo $k->no_mesin ?></td>
                  <td><?php echo $k->no_rangka ?></td>
                  <td><?php echo $k->no_polisi ?></td>
                  <td><?php echo $k->merk ?></td>
                  <td><?php echo $k->jenis_kendaraan ?></td>
                  <td>
                    <a href="<?php echo base_url('admin/kendaraan/edit/'.$k->id_kendaraan); ?>">
                    Edit
                    </a> |
                    <?php echo anchor('admin/kendaraan/delete/'.$k->id_kendaraan,'Hapus'); ?>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Garasi</th>
                  <th>No Mesin</th>
                  <th>No Rangka</th>
                  <th>No Polisi</th>
                  <th>Merk</th>
                  <th>Jenis Kendaraan</th>
                  <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->