

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
    ?> <p style="color:red" align="center"> <?php echo $this->session->flashdata('sukses'); ?></p> <?php
    ?>

    <!-- TABLE: LATEST ORDERS -->
    <div class="box">
      <div class="box-header ">
        <h3 class="box-title">Input Project</h3>

      </div>
      <!-- /.box-header -->
      <div class="box">

        <!-- /.box-header -->
        <!-- form start -->
        <?php echo form_open('project/inputProject');?>

        <div class="form-horizontal box-body">

          <!-- mengambil no project ditambah 1; -->
          <?php 

          if($status==1){

            foreach ($project as $key => $project) {
              $no = $project->no_project;
            }
            $no = $no +1;

          }
          elseif ($status==0) {
            $no = 1;
          }

          ?>
          <div class="form-group">
            <label class="col-sm-2 control-label">No Project</label>
            <div class="col-sm-10">


              <input type="text" class="form-control" name="no_project" placeholder="<?php echo $no; ?>" value="<?php echo $no; ?>" readonly>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Project</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_project" placeholder="Nama Project" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Sumber Project</label>
            <div class="col-sm-10">

              <select class="form-control" name="sumber_project" required>
               <?php
               foreach ($sumber_project as $sumber) {
                 # code...
                ?>
                <option value="<?php echo $sumber->id_sumber_project ; ?>" ><?php echo $sumber->nama_sumber_project ;?></option>
                <?php
              }
              ?>
            </select>

          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Status Project</label>
          <div class="col-sm-10">
            <select class="form-control" name="status_project" required>
              <?php
              foreach ($status_project as $status) {
                 # code...
                ?>
                <option value="<?php echo $status->id_status_project ; ?>" ><?php echo $status->nama_status_project ;?></option>
                <?php
              }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Klien</label>
          <div class="col-sm-10">
            <select class="form-control" name="client" required>
             <?php
             foreach ($klien as $klien) {
                 # code...
              ?>
              <option value="<?php echo $klien->id_klien ; ?>" ><?php echo $klien->nama_klien ;?></option>
              <?php
            }
            ?>              </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Kategori Client</label>
          <div class="col-sm-10">
            <select class="form-control" name="kategori_client" required>
             <?php
             foreach ($kategori_client as $kategori) {
                 # code...
              ?>
              <option value="<?php echo $kategori->id_kategori_client ; ?>" ><?php echo $kategori->nama_kategori_client ;?></option>
              <?php
            }
            ?> 
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal Mulai:</label>
        <div class="input-group date">
          <div class="col-sm-10">
            <input type="text" class="form-control pull-right" id="datepickerx" name="tanggal_mulai" required>
          </div>
        </div>

      </div>


      <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal Akhir:</label>


        <div class="input-group date">
          <div class="col-sm-10">
            <input type="text" class="form-control pull-right" id="datepickery" name="tanggal_selesai" required>
          </div>
        </div>
      </div>

      <!-- /.input group -->
    </div>



  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <!-- <button type="submit" class="btn btn-default">Cancel</button>-->           
    <button type="submit" class="btn btn-info pull-right">Submit</button>
  </div>
  <!-- /.box-footer -->
  <?php echo form_close();?>
</div>

<!-- /.table-responsive -->
</div>
<!-- /.box-body -->

<!-- /.box-footer -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->



<!-- Script show datepicker -->
<script>


  // $( function() {
  // $("#datepickerx").datepicker({

  //   autoclose :true,
  //   // numberOfMonths: 2,
  //   minDate: 0,
  //   onSelect: function(selected) {
  //     $("#datepickery").datepicker("option", "minDate", selected);
  //     select();
  //   }
  // });
  // $("#datepickery").datepicker({

  //   autoclose :true,
  //     // showMonthAfterYear: true,
  //     // numberOfMonths: 2,
  //   onSelect: function(selected) { //you have a syntax issue here the select method has to be called inside the default handler
  //     $("#datepickerx").datepicker("option", "maxDate", selected)
  //     select();
  //   }
  // });

  // }


  // );

</script>

<script>
  
  $(document).ready(function () {
    
    $("#datepickery").prop('disabled', true);
    $("#datepickerx").on('input', function() {
      disablePicker();
    });

    function disablePicker(){
      var startdate = $('#datepickerx').val();
      if(startdate != ''){
        $("#datepickery").prop('disabled', false);
      }
      else{
        $("#datepickery").val('');
        $("#datepickery").prop('disabled', true);      
      }
    }

    $("#datepickerx").datepicker({
     onSelect: function (date) 
     {

      var dt2 = $('#datepickery');
      var minDate = $(this).datepicker('getDate');
      dt2.datepicker('option', 'minDate', minDate);
      disablePicker();

      // var startDate = $(this).datepicker('getDate');
      //dt2.datepicker('setDate', minDate);
      //sets dt2 maxDate to the last day of 30 days window
      // dt2.datepicker('option', 'maxDate', startDate);
      // $(this).datepicker('option', 'minDate', minDate);
    }
  });

    $('#datepickery').datepicker({

    });
  });

</script>
