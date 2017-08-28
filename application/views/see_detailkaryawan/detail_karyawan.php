

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
   <?php        
   ?> 
   <p style="color:red" align="center"> <?php echo $this->session->flashdata('sukses'); ?></p>
   <p style="color:red" align="center"> <?php echo $this->session->flashdata('hapus'); ?></p>
   <?php
   ?>

   <!-- TABLE: LATEST ORDERS -->
   <div class="box">

    <div class="box-header ">
      <h3 class="box-title">Transaksi Project</h3>
      <button id="karyawan" class="btn btn-success btn-sm">+</button>
    </div>
    <!-- /.box-header -->
    <div class="box">
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body form-horizontal">



        <!-- mengambil no project ditambah 1; -->
        <?php 
        if($status==0){
          echo "Silahkan tambah karyawan";
        }

        else if($status==1)
        {
          ?>

          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>No Project</th>
                <th>Nama Karyawan</th>
                <th>Nama job</th>
                <th>Detail Jenis Project</th>
                <th>Status Project</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Action</th>
              </tr>

              <?php
              foreach ($transaksi_project as $transaksi_project) 
              {                          

                ?>
                <tr>
                  <td><?php echo $transaksi_project->no_project; ?></td>
                  <td><?php echo $transaksi_project->nama_karyawan; ?></td>
                  <td><?php echo $transaksi_project->nama_job; ?></td>
                  <td><?php echo $transaksi_project->detail_jenis_project ?></td>
                  <td><?php echo $transaksi_project->nama_status_project ?></td>
                  <td><?php echo $transaksi_project->tanggal_mulai ?></td>
                  <td><?php echo $transaksi_project->tanggal_selesai ?></td>
                  <td><a href=""  class="btn btn-danger" data-toggle="modal" onclick="confirm_modal('<?php echo base_url("project/delete_transaksi_project/".$transaksi_project->id_transaksi_project);?>','Title');" data-target="#myModal">Edit</a></td>
                  <td><a href=""  class="btn btn-danger" data-toggle="modal" onclick="confirm_modal('<?php echo base_url("project/delete_transaksi_project/".$transaksi_project->id_transaksi_project);?>','Title');" data-target="#myModal">Delete</a></td>
                </tr>
                <?php
              }
              ?>



            </table>
          </div>

          <?php
        }
        ?>

        <!-- add karyawan -->
        <?php echo form_open('project/inputTransaksiProject');?>
        <div id="tambah" style="display:none;">



         <div class="box-header ">
           <hr>
           <h3 class="box-title">Tambah karyawan</h3>
           <hr>
         </div>

         <div class="form-group">
          <label class="col-sm-2 control-label">no project</label>
          <div class="col-sm-10">
            <input type="hidden" name="id_project" id="id_projectt" value="<?php echo $id_project;?>">
            <input type="text" class="form-control" value="<?php echo $nomor_project;?>" readonly>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Karyawan</label>
          <div class="col-sm-10">

            <select class="form-control" name="id_karyawan">
             <?php
             foreach ($karyawan as $karyawan) {
                 # code...
              ?>
              <option value="<?php echo $karyawan->id_karyawan ; ?>" ><?php echo $karyawan->nama_karyawan ;?></option>
              <?php
            }
            ?>
          </select>

        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Job</label>
        <div class="col-sm-10">
          <select class="form-control" name="id_job">
            <?php
            foreach ($job as $job) {
                 # code...
              ?>
              <option value="<?php echo $job->id_job ; ?>" ><?php echo $job->nama_job ;?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Detail Jenis Project</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="detail_jenis_project" placeholder="Detail Jenis Project" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Status Project</label>
        <div class="col-sm-10">
          <select class="form-control" name="id_status_project">
            <?php
            foreach ($status_project as $status_project) {
                 # code...
              ?>
              <option value="<?php echo $status_project->id_status_project ; ?>" ><?php echo $status_project->nama_status_project ;?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal Mulai</label>
        <div class="input-group date">
          <div class="col-sm-10">
            <input type="hidden" class="form-control pull-right" id="tanggal_mulaix" value="<?php echo $tanggal_mulai_project ; ?>">
            <input type="text" class="form-control pull-right" id="datepickerx" name="tanggal_mulai" value="<?php echo $tanggal_mulai_project ; ?>">
          </div>
        </div>

      </div>


      <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal Akhir</label>


        <div class="input-group date">
          <div class="col-sm-10">
            <input type="hidden" class="form-control pull-right" id="tanggal_selesaix" value="<?php echo $tanggal_selesai_project ; ?>">
            <input type="text" class="form-control pull-right" id="datepickery" name="tanggal_selesai" value="<?php echo $tanggal_selesai_project ; ?>">
          </div>
        </div>
      </div>
      <!-- /.input group -->

      <div class="text-center"><button type="submit" class="btn btn-info btn-lg">Submit</button></div>
    </div>
  </div>

</div>
<!-- /.box-body -->
<?php echo form_close();?>
</div>

<!-- MODAL -->
<div class="modal fade" id="modal_delete_m_n"  data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to Delete ?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <span id="preloader-delete"></span>
      </br>
      <input type="text" id="urldelete">
      <a class="btn btn-danger" id="delete_link_m_n" onclick="deleteKaryawan()">Delete</a>

      <button type="button" class="btn btn-info" data-dismiss="modal" id="delete_cancel_link">Cancel</button>

    </div>
  </div>
</div>

</div>

<!-- /.table-responsive -->
</div>
<!-- /.box-body -->

<!-- /.box-footer -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->



<script type="text/javascript">

  $(document).ready(function(){

    $("#karyawan").click(function(){
      $("#tambah").toggle(500);
    }); 




  });

</script>

<!-- Script show datepicker -->
<script>
  $( function() {
    $('#datepickerx').datepicker({

      autoclose: true,

      minDate: 0
    })
    $('#datepickery').datepicker({

      autoclose: true
    })
    
  }


  );

</script>

<!-- modal js -->
<script>  
  var delete_url = "";
  function confirm_modal(delete_url,title)
  {
    jQuery('#modal_delete_m_n').modal('show', {backdrop: 'static',keyboard :false});
        //jQuery("#modal_delete_m_n .grt").text(title);
        var idd_project = $("#id_projectt").val()
        delete_url += "/"+idd_project;
        $("#urldelete").val(delete_url);

        // document.getElementById('delete_link_m_n').setAttribute("href" , delete_url );
        // document.getElementById('delete_link_m_n').focus();

        
      }
      function deleteKaryawan(){
        var deleteurl = $("#urldelete").val();
        window.location.assign(deleteurl);
      }
    // $(document).ready(function(){
    //   $("#delete_link_m_n").on("click", function(){
    //     // var delete_url = document.getElementById('delete_link_m_n').getAttribute("href");
    //     // window.location.assign(delete_url);
    //   });
    // });
</script>
