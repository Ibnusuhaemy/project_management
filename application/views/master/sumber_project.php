

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Project Management
      <small>Version 1.0</small>
    </h1>

  </section>

  <p style="color:red" align="center"> <?php echo $this->session->flashdata('sukses'); ?></p>
  <p style="color:red" align="center"> <?php echo $this->session->flashdata('hapus'); ?></p>

  <!-- Main content -->
  <section class="content">

    <!-- TABLE: LATEST ORDERS -->
    <div class="box">
      <div class="box-header ">
        <h3 class="box-title">Sumber Project</h3>
        <button onclick="add_sumber()" class="btn btn-success btn-sm">Add Sumber</button>

      </div>
      <!-- /.box-header -->
      <div class="box">

        <div id="content">
         <div class="box-body table-responsive no-padding">
           <table id="mytable" class="table-responsive display" cellspacing="0" width="100%">
            <thead>
              <tr>

                <th>No</th>
                <th>Nama Sumber</th>
                <th>Kondisi</th>
                <th>Action</th>

              </tr>
            </thead>
          </table>
        </div>
      </div>

      <!-- /.box-header -->
      <!-- form start -->



      <!-- /.input group -->
    </div>

  </div>
  <!-- /.box-body -->

  <!-- /.box-footer -->


  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form_edit" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Person Form</h3>
        </div>
        <div class="modal-body form">

          <form data-toggle="validator" id="modal_form" class="form-horizontal">
          <!-- HIDDEN ID -->
            <input type="hidden" value="" name="id"/> 
            <div class="form-body">

              <div class="form-group">
                <label class="control-label col-md-3">Sumber Project</label>
                <div class="col-md-9">
                  <input name="status" id="status1" placeholder="Sumber Project" class="form-control" type="text" required>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group">
              <label class="control-label col-md-3">Kondisi master</label>
                <div class="col-md-9">
                  <select class="form-control" name="kondisi">
                   <option value="aktif">Aktif</option>
                   <option value="nonaktif">NonAktif</option>

                  </select>
                </div>
              </div>

              <div class="modal-footer">
               <!--    <input type="text" id="urlupdate"> -->
               <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
             </div>
           </div><!-- /.modal-content -->
         </form>

       </div><!-- /.modal-dialog -->

     </div><!-- /.modal -->

   </div>
 </div>

 <!-- show datatabel -->
 <script type="text/javascript">
  var tabeldata ;

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
      ajax: {"url": "<?php echo base_url('master/sumber_project_datatabel');?>", "type": "POST"},
      columns: 
      [

      {"data": "id_sumber_project",
      "orderable": false},
      {"data": "nama_sumber_project"},
      {"data": "kondisi_enum"},
      {"data": "edit",
      "orderable": false},
      // {"data": "delete",
      // "orderable": false},

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


    function add_sumber()
    {
      save_method = 'add';
    $('#modal_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_edit').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Add Status Project'); // Set Title to Bootstrap modal title
  }


  function edit_sumber(id)
  {
    save_method = 'update';
    $('#modal_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo base_url('master/ajax_edit_sumber_project/')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {

       $('[name="id"]').val(data.id_sumber_project); 
       $('[name="status"]').val(data.nama_sumber_project); 
       $('[name="kondisi"]').val(data.kondisi_enum); 
       
       $('#modal_form_edit').modal('show'); // show bootstrap modal when complete loaded
       $('.modal-title').text('Edit Sumber'); // Set title to Bootstrap modal title

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
  }

  function save()
  {

    var test = $('#status1').val();
    if (test==''){
      alert('data tidak boleh kosong');


    }

    else{

    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
      url = "<?php echo site_url('master/ajax_add_sumber_project')?>";
    } else {
      url = "<?php echo site_url('master/ajax_update_sumber_project')?>";
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

<!-- Script show datepicker -->
<script>
  $( function() {
    $('#datepickerx').datepicker({
      dateFormat: "dd-M-yy",
      autoclose: true,
      minDate: 0
    })
    $('#datepickery').datepicker({
      autoclose: true
    })
    
  }


  );

</script>

<script>  


</script>
