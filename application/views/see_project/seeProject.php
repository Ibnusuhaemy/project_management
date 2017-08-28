


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
        <h3 class="box-title">Project</h3>
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
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <button type="button" id="reloadDataTable" onclick="reload_table()" class="btn btn-success"                
              </style>Reload Table</button>
              <br>
              <br>
             <table id="mytable" class="table-responsive display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Project</th>
                  <th>Nama Project</th>
                  <th>Sumber Project</th>
                  <th>Status Project</th>
                  <th>Client</th>
                  <th>Kategori Project</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Action</th>
                  <th>Action</th>

                </tr>
              </thead>
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
</section>
<!-- /.box -->
</div>
<!-- /.col -->

<!-- MODAL UTAMA -->
<div class="modal fade" id="modal_form_edit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Project edit</h3>
      </div>
      <div class="modal-body form">

        <form action="#" id="modal_form" class="form-horizontal">
         <!--  <input type="hidden" value="" name="id"/>  -->
         <div class="form-body">

           <!-- HIDDEN -->
           <input type="hidden" name="id_projectt" id="val" class="form-control" >


           <div class="form-group">
            <label class="col-sm-2 control-label">nama project</label>
            <div class="col-sm-10">
              <!-- super hidden disini -->
              <input type="text" name="nama_project" id="val1" class="form-control" >
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label">Sumber Project</label>
            <div class="col-sm-10">
              <select class="form-control" name="sumber_project" id="val2" >
                <?php
                foreach ($sumber_project as $sumber_project) {
                 # code...
                  ?>
                  <option value="<?php echo $sumber_project->id_sumber_project ; ?>"><?php echo $sumber_project->nama_sumber_project ; ?> </option>
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
                  <option value="<?php echo $status_project->id_status_project ; ?>">
                  <?php echo $status_project->nama_status_project ; ?>
                   </option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Klien</label>
            <div class="col-sm-10">
              <select class="form-control" name="klien" id="val4" required>
               <?php
               foreach ($klien as $klien) {
                 # code...
                ?>
                <option value="<?php echo $klien->id_klien ; ?>" ><?php echo $klien->nama_klien ;?></option>
                <?php
              }
              ?>              
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Kategori Client</label>
          <div class="col-sm-10">
            <select class="form-control" name="kategori_client" id="val7" required>
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
           <input type="text" id="val5" class="form-control pull-right"  name="tanggal_mulai"  >
         </div>
       </div>

     </div>


     <div class="form-group">
      <label class="col-sm-2 control-label">Tanggal Akhir:</label>
      <div class="input-group date">
        <div class="col-sm-10">
          <input type="text" id="val6" class="form-control pull-right"  name="tanggal_selesai" >
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


<!-- Modal taruh depan -->
<style>
  #val5{z-index:1151 !important;}
</style>

<style>
  #val6{z-index:1151 !important;}
</style>

<!-- Script show datepicker -->
<script>
  // $( function() {
  //   $('#val5').datepicker({
  //     autoclose: true,
  //     minDate: 0
  //   })
  //   $('#val6').datepicker({
  //     autoclose: true
  //   })
  // }
  // );
</script>

<script>

</script>

<!-- SCRIPT 1 -->

<script type="text/javascript">

  var testtanggal='';

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
        .off('.DT')
        .on('keyup.DT', function(e) {
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
      ajax: {"url": "<?php echo base_url('project/json');?>", "type": "POST"},
      columns: [
      {
        "data": "id_project",
        "orderable": false
      },
      {"data": "no_project"},
      {"data": "nama_project"},
      {"data": "namasumber"},
      {"data": "namastatus"},
      {"data": "namaklien"},
      {"data": "namakategori"}, 
      {"data": "tanggal_mulai_project"},
      {"data": "tanggal_selesai_project"},
      {"data": "edit",
      "orderable": false},
      {"data": "view",
      "orderable": false}

      ],
      order: [[1, 'desc']],
      rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        var index = page * length + (iDisplayIndex + 1);
        $('td:eq(0)', row).html(index);
      }



    });
});

var id = $('#id_project').val();

function edit_project(id)
{

  save_method = 'update';
    $('#modal_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo base_url('project/edit_project_ajax/')?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {

        $('[name="id_projectt"]').val(data.id_project); 
        $('[name="nama_project"]').val(data.nama_project);


        $('[name="sumber_project"]').val(data.id_sumber_project); 
        
        teststatus = data.id_status_project;
        $('[name="status_project"]').val(data.id_status_project);
        
        $('[name="klien"]').val(data.id_klien);
        
        $('[name="kategori_client"]').val(data.id_kategori_client);

        //help
        testtanggal = data.tanggal_mulai_project;
        $('[name="tanggal_mulai"]').val(data.tanggal_mulai_project);

        $('[name="tanggal_selesai"]').val(data.tanggal_selesai_project); 

       $('#modal_form_edit').modal('show'); // show bootstrap modal when complete loaded
       $('.modal-title').text('Edit Status'); // Set title to Bootstrap modal title

       var minDate = new Date(testtanggal);
       $('#val6').datepicker('option', 'minDate', minDate);
     },

     error: function (jqXHR, textStatus, errorThrown)
     {
      alert('Error get data from ajax');
    }
  });



var dt2='';
dt1 = $('#val5').datepicker('getDate');
dt2 = $('#val6');

$("#val5").on('input', function() {
  disablePicker();
});

function disablePicker(){
  var startdate = $('#val5').val();
  if(startdate != ''){
    $("#val6").prop('disabled', false);
    
  }
  else{
    $("#val6").val("");      
    $("#val6").prop('disabled', true);      

  }

}
  $("#val5").datepicker({
   onSelect: function (date) 
   {

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

  $('#val6').datepicker({

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
  var kategori_client = $('#val7').val();

  if (id_karyawan=='' || id_job==''|| detail_jenis_project==''|| id_status_project==''|| tanggal_mulai==''|| tanggal_selesai=='' || kategori_client==''){
    alert('data tidak boleh kosong');

  }

  else{


    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url = "<?php echo site_url('project/update_project_ajax')?>";



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
             // alert('test');
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