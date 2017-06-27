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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
              <a href="<?php echo base_url('admin/transaksi/input'); ?>">
                <button class="btn btn-primary">Tambah</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Transaksi</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Kendaraan</th>
                  <th>Supir</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($transaksi_qset as $t){ ?>
                <tr>
                  <td><?php echo $t->kode ?></td>
                  <td><?php echo $t->tanggal ?></td>
                  <td><?php echo $t->status ?></td>
                  <td><?php echo $t->merk ?> - <?php echo $t->no_polisi ?></td>
                  <td><?php echo $t->nama ?></td>
                  <td>
                    <a href="<?php echo base_url('admin/transaksi/edit/'.$t->id_transaksi); ?>">
                    Edit
                    </a> |
                    <?php echo anchor('admin/transaksi/delete/'.$t->id_transaksi,'Hapus'); ?>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Kode Transaksi</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Kendaraan</th>
                  <th>Supir</th>
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