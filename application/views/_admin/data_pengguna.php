  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?php echo base_url('admin/data_pengguna/input'); ?>">
                <button class="btn btn-primary">Tambah</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Pengguna</th>
                  <th>Hak Akses</th>
                  <th>No HP</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($users as $u){ ?>
                <tr>
                  <td><?php echo $u->nama_pengguna ?></td>
                  <td><?php echo $u->hak_akses ?></td>
                  <td><?php echo $u->no_hp ?></td>
                  <td>
                    <a href="<?php echo base_url('admin/data_pengguna/edit/'.$u->id_pengguna); ?>">
                    Edit
                    </a> |
                    <?php echo anchor('admin/data_pengguna/delete/'.$u->id_pengguna,'Hapus'); ?>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Pengguna</th>
                  <th>Hak Akses</th>
                  <th>No HP</th>
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