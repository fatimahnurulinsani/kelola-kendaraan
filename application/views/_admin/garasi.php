  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Garasi
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Garasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
              <a href="<?php echo base_url('admin/garasi/input'); ?>">
                <button class="btn btn-primary">Tambah</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No Garasi</th>
                  <th>Jenis Garasi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($garasi_qset as $g){ ?>
                <tr>
                  <td><?php echo $g->no_garasi ?></td>
                  <td><?php echo $g->jenis_garasi ?></td>
                  <td>
                    <a href="<?php echo base_url('admin/garasi/edit/'.$g->id_garasi); ?>">
                    Edit
                    </a> |
                    <?php echo anchor('admin/garasi/delete/'.$g->id_garasi,'Hapus'); ?>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No Garasi</th>
                  <th>Jenis Garasi</th>
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