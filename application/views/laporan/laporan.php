


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Project Management
      <small>Version 1.0</small>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- TABLE: LATEST ORDERS -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Latest Orders</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="box-tools">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <table id="mytable" class="table-responsive display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Id Project</th>
                  <th>No Project</th>
                  <th>Nama Project</th>
                  <th>Status Project</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>

                </tr>
              </thead>

              <?php
              foreach ($transaksi_project as $transaksi_project) 
              {                          

                ?>
                <tr>
                  <td><?php echo $transaksi_project->id_project ; ?></td>
                  <td><?php echo $transaksi_project->no_project; ?></td>
                  <td><?php echo $transaksi_project->nama_project; ?></td>
                  <td><?php echo $transaksi_project->nama_status; ?></td>
                  <td><?php echo $transaksi_project->tanggal_mulai ?></td>
                  <td><?php echo $transaksi_project->tanggal_selesai ?></td>
                </tr>
                <?php
              }
              ?>

            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>

    <!-- /.box-body -->
    <!-- /.box-footer -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->

<!-- SCRIPT 1 -->
