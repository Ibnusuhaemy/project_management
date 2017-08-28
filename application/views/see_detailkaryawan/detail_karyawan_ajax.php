
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

    <!-- ID hidden hidden -->

    <input type="hidden" id="id_hidden" value="<?php echo $id; ?>">



    <!-- TABLE: LATEST ORDERS -->
    <div class="box">

      <div class="box-header ">
        <h3 class="box-title">Transaksi Project <strong><?php echo $nama_project; ?></strong> </h3>
        <button onclick="add_status()" class="btn btn-success btn-sm">+</button>
      </div>
      <!-- /.box-header -->
      <div class="box">
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body form-horizontal">



          <div class="box-body table-responsive no-padding">

             <h3>Aktif</h3>

            <table id="mytable" class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Project</th>
                  <th>Nama Karyawan</th>
                  <th>Nama job</th>
                  <th>Detail Jenis Project</th>
                  <th>Status Project</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Action</th>
                  <th>Action</th>

                </tr>
              </thead>



            </table>

            <h3>Non Aktif</h3>

            <table id="mytable2" class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Project</th>
                  <th>Nama Karyawan</th>
                  <th>Nama job</th>
                  <th>Detail Jenis Project</th>
                  <th>Status Project</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
              

                </tr>
              </thead>



            </table>

          </div>

        </div>
      </div>

    </div>
    <!-- /.box-body -->
    <?php echo form_close();?>

  </section>
</div>

<!-- MODAL UTAMA -->
<div class="modal fade" id="modal_form_edit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Person Form</h3>
      </div>
      <div class="modal-body form">

        <form action="#" id="modal_form" class="form-horizontal">
         <!--  <input type="hidden" value="" name="id"/>  -->
         <div class="form-body">

           <div class="form-group">
            <label class="col-sm-2 control-label">no project</label>
            <div class="col-sm-10">
              <!-- super hidden disini -->
              <input type="hidden" name="id_transaksi_projectt" class="form-control" >
              <input type="hidden" name="id_projectt" class="form-control" value="<?php echo $id_project ?>">
              <input type="text" name="noo_project" class="form-control" value="<?php echo $nomor_project ?>" readonly>
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
                <option id="val1" value="<?php echo $karyawan['id_karyawan'] ; ?>" ><?php echo $karyawan['nama_karyawan']; ?> </option>
                <?php
              }
              ?>
            </select>

          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Job</label>
          <div class="col-sm-10">
            <select class="form-control" id="val2" name="id_job" id="id_job">
              <?php
              foreach ($job as $jobs) {
                 # code...
                ?>
                <option value="<?php echo $jobs['id_job'] ; ?>"><?php echo $jobs['nama_job'] ; ?> </option>
                <?php
              }
              ?>
            </select>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-2 control-label">Status Project</label>
          <div class="col-sm-10">
            <select class="form-control" name="status_project" id="val3" >
              <?php
              foreach ($status_project as $status_project) {
                 # code...
                ?>
                <option value="<?php echo $status_project['id_status_project'] ; ?>"><?php echo $status_project['nama_status_project'] ; ?> </option>
                <?php
              }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Detail Jenis Project</label>
          <div class="col-sm-10">
            <input type="text" id="val4" class="form-control" name="detail_jenis_project" placeholder="Detail Jenis Project" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Tanggal Mulai:</label>
          <div class="input-group date">
            <div class="col-sm-10">
             <input type="hidden" id="val10" class="form-control pull-right" value="<?php echo $tanggal_mulai; ?>" >
             <input type="text" id="val5" class="form-control pull-right"  name="tanggal_mulai"  >
           </div>
         </div>

       </div>


       <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal Akhir:</label>
        <div class="input-group date">
          <div class="col-sm-10">
            <input type="hidden" id="val11" class="form-control pull-right"  value="<?php echo $tanggal_selesai; ?>" >
            <input type="text" id="val6" class="form-control pull-right"  name="tanggal_selesai"  >
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </form>

</div><!-- /.modal-dialog -->

</div><!-- /.modal -->

</div>

</div>

<style>
  #val5{z-index:1151 !important;}
</style>

<style>
  #val6{z-index:1151 !important;}
</style>


<script type="text/javascript">

  $(document).ready(function () {

    $("#val6").prop('disabled', false);
    $("#val5").on('input', function() {
      disablePicker();
    });

    function disablePicker(){
      var startdate = $('#val5').val();
      if(startdate != ''){
        $("#val6").prop('disabled', false);
      }
      else{
        $("#val6").val('');
        $("#val6").prop('disabled', true);      
      }
    }

    //cek tanggal

    function checkGreater(){

      var maxDateEnd = $('#val6');

      var minDate1 = $('#val5').val();
      var maxDate1 = $('#val6').val();
      //alert(minDate1+" "+maxDate1);


      if(minDate1>maxDate1){
        //alert('sukses');
        maxDateEnd.datepicker('setDate',minDate1);

      }

    }

    $("#val5").datepicker({
     onSelect: function (date) 
     {

      disablePicker();
      checkGreater();

      // var startDate = $(this).datepicker('getDate');
      //dt2.datepicker('setDate', minDate);
      //sets dt2 maxDate to the last day of
       //30 days window
      // dt2.datepicker('option', 'maxDate', startDate);
      // $(this).datepicker('option', 'minDate', minDate);
    }

  });

    $('#val6').datepicker({
      onSelect : function(date)
      {
        checkGreater();
      }


    });

    //invisible
    var dt1 = $('#val5');
    var dt2 = $('#val6');
    //core
    var minDate = $('#val10').val();
    var maxDate = $('#val11').val();

    var min1 = new Date(minDate);
    var max1 = new Date(maxDate);
   // alert(min1);

   dt1.datepicker('option', 'minDate', min1);
   dt1.datepicker('option', 'maxDate', max1);

   dt2.datepicker('option', 'minDate', min1);
   dt2.datepicker('option', 'maxDate', max1);


 });



var id1 ;
id1 = $('#id_hidden').val();


$(document).ready(function() {
  $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
  {
    return {
      "iStart": oSettings._iDisplayStart,
      "iEnd": oSettings.fnDisplayEnd(),
      "iLength": oSettings._iDisplayLength,
      "iTotal": oSettings.fnRecordsTotal(),
      "iFilteredTotal": oSettings.fnRecordsDisplay(),
      "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
      "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
  };

  tabeldata = $("#mytable").dataTable({

    initComplete: function() {
      var api = this.api();
      $('#mytable_filter input')
     
      .on('DT', function(e) {
        if (e.keyCode == 13) {
          api.search(this.value).draw();
        }
      });
    },
    oLanguage: {
      sProcessing: "loading..."
    },
    processing: true,
    serverSide: true,
    ajax: {"url": "<?php echo base_url('project/detail_transaksi_project_ajax/');?>"+id1, "type": "POST"},
    columns: 
    [

    {"data": "id_transaksi_project",
    "orderable": false},
    {"data": "no_project"},
    {"data": "nama_karyawan"},
    {"data": "nama_job"},
    {"data": "detail_jenis_project"},
    {"data": "nama_status_project"},
    {"data": "tanggal_mulai"},
    {"data": "tanggal_selesai"},
    {"data": "edit",
    "orderable": false},
    {"data": "delete",
    "orderable": false},

    ],

    rowCallback: function(row, data, iDisplayIndex) {
      var info = this.fnPagingInfo();
      var page = info.iPage;
      var length = info.iLength;
      var index = page * length + (iDisplayIndex + 1);
      $('td:eq(0)', row).html(index);
    }
  });

tabeldata2 = $("#mytable2").dataTable({

  initComplete: function() {
    var api = this.api();
    $('#mytable_filter input')
  
    .on('DT', function(e) {
      if (e.keyCode == 13) {
        api.search(this.value).draw();
      }
    });
  },
  oLanguage: {
    sProcessing: "loading..."
  },
  processing: true,
  serverSide: true,
  ajax: {"url": "<?php echo base_url('project/detail_transaksi_project_ajax_non/');?>"+id1, "type": "POST"},
  columns: 
  [

  {"data": "id_transaksi_project",
  "orderable": false},
  {"data": "no_project"},
  {"data": "nama_karyawan"},
  {"data": "nama_job"},
  {"data": "detail_jenis_project"},
  {"data": "nama_status_project"},
  {"data": "tanggal_mulai"},
  {"data": "tanggal_selesai"},


  ],

  rowCallback: function(row, data, iDisplayIndex) {
    var info = this.fnPagingInfo();
    var page = info.iPage;
    var length = info.iLength;
    var index = page * length + (iDisplayIndex + 1);
    $('td:eq(0)', row).html(index);
  }
});

});

function delete_status(id)
{
  if(confirm('Are you sure delete this data?'))
  {
        // ajax delete data to database
        $.ajax({
          url : "<?php echo base_url('project/ajax_delete_transaksi_project')?>/"+id,
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
                //if success reload ajax table
                
                reload_table();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error deleting data');
              }
            });

      }
    }

    function add_status()
    {
      save_method = 'add';
    $('#modal_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_edit').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Add klien'); // Set Title to Bootstrap modal title
  }

  function edit_status(id)
  {

    save_method = 'update';
    $('#modal_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo base_url('project/ajax_edit_transaksi_project/')?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {

        console.log(data);

        $('[name="id_transaksi_projectt"]').val(data.id_transaksi_project); 
        $('[name="noo_project"]').val(data.no_project);
        $('[name="id_karyawan"]').val(data.nama_karyawan); 

        $('[name="id_job"]').val(data.id_job);
        $('[name="id_karyawan"]').val(data.id_karyawan);
        $('[name="status_project"]').val(data.id_status_project);
        
        $('[name="tanggal_mulai"]').val(data.tanggal_mulai);
        $('[name="tanggal_selesai"]').val(data.tanggal_selesai);

        $('[name="detail_jenis_project"]').val(data.detail_jenis_project); 


       $('#modal_form_edit').modal('show'); // show bootstrap modal when complete loaded
       $('.modal-title').text('Edit Status'); // Set title to Bootstrap modal title

     },
     error: function (jqXHR, textStatus, errorThrown)
     {
      alert('Error get data from ajax');
    }
  });
}

function save()
{


  var id_karyawan = $('#val1').val();
  var id_job = $('#val2').val();
  var detail_jenis_project = $('#val3').val();
  var id_status_project = $('#val4').val();
  var tanggal_mulai = $('#val5').val();
  var tanggal_selesai = $('#val6').val();

  if (id_karyawan=='' || id_job==''|| detail_jenis_project==''|| id_status_project==''|| tanggal_mulai==''|| tanggal_selesai==''){
    alert('data tidak boleh kosong');

  }

  else{


    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
      url = "<?php echo site_url('project/ajax_add_transaksi_project')?>";
    } else {
      url = "<?php echo site_url('project/ajax_update_transaksi_project')?>";
    }

    // ajax adding data to database
    $.ajax({
      url : url,
      type: "POST",
      data: $('#modal_form').serialize(),
      dataType: "JSON",
      success: function(data)
      {


            if(data.status == 'TRUE') //if success close modal and reload ajax table
            {
              $('#modal_form_edit').modal('hide');
              reload_table();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

          }
        });
  }
}

function reload_table(){
  tabeldata.api().ajax.reload(null,false);
}
</script>
