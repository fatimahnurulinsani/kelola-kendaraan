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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
              <a href="<?php echo base_url('admin/supir/input'); ?>">
                <button class="btn btn-primary">Tambah</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>No Ktp</th>
                  <th>No Hp</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($supir_qset as $s){ ?>
                <tr>
                  <td><?php echo $s->kode ?></td>
                  <td><?php echo $s->nama ?></td>
                  <td><?php echo $s->no_ktp ?></td>
                  <td><?php echo $s->no_hp ?></td>
                  <td><?php echo $s->alamat ?></td>
                  <td>
                    <a href="<?php echo base_url('admin/supir/edit/'.$s->id_supir); ?>">
                    Edit
                    </a> |
                    <?php echo anchor('admin/supir/delete/'.$s->id_supir,'Hapus'); ?>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>No Ktp</th>
                  <th>No Hp</th>
                  <th>Alamat</th>
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