

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
        <h3 class="box-title">Karyawan</h3>
        <button onclick="add_karyawan()" class="btn btn-success btn-sm">Add Karyawan</button>

      </div>
      <!-- /.box-header -->

      <!-- /.box-header -->
      <div class="box">

       <div id="content">
         <div class="box-body table-responsive no-padding">
           <table id="mytable" class="table-responsive display" cellspacing="0" width="100%">
            <thead>
              <tr>

                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Username Karyawan</th>
                <th>Status Karyawan</th>
                <th>Kondisi</th>
                <th>Action</th>

              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<!--get password lama -->
<<?php foreach ($karyawan as $karyawan): 
$passwordlamareal = $karyawan->password_karyawan;
?>
<?php endforeach ?>

<!-- edit -->
<div class="modal fade" id="modal_form_edit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Person Form</h3>
      </div>
      <div class="modal-body form">

        <form action="#" id="modal_form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-3">Nama Karyawan</label>
              <div class="col-md-9">
                <input name="nama_karyawan" id="edit1" placeholder="Nama Karyawan" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Username Karyawan</label>
              <div class="col-md-9">
                <input name="username" id="edit2" placeholder="Username" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Password Karyawan Lama</label>
              <div class="col-md-9">
                <input name="passwordlamareal" placeholder="Password" class="form-control" type="hidden" value="<?= $passwordlamareal; ?>">
                <input name="passwordlama" placeholder="Password" class="form-control" type="password">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Password Karyawan Baru</label>
              <div class="col-md-9">
                <input name="passwordbaru" placeholder="Password2" class="form-control" type="password">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">status</label>
              <div class="col-md-9">
                <select class="form-control" name="status_karyawan">
                  <option>Super admin</option>
                  <option>Admin</option>
                  <option>Project Manager</option>
                  <option>Karyawan</option>
                </select>

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
              <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div><!-- /.modal-content -->
        </form>

      </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->

  </div>
</div>

<!-- add -->
<div class="modal fade" id="modal_form_add" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Person Form</h3>
      </div>
      <div class="modal-body form">

        <form action="#" id="modal_form1" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-3">Nama Karyawan</label>
              <div class="col-md-9">
                <input name="nama_karyawan" id="add1" placeholder="Nama Karyawan" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Username Karyawan</label>
              <div class="col-md-9">
                <input name="username" id="add2" placeholder="Username" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Password Karyawan</label>
              <div class="col-md-9">

                <input name="passwordlama" id="add3" placeholder="Password" class="form-control" type="password">
                <span class="help-block"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">status</label>
              <div class="col-md-9">
                <select class="form-control" name="status_karyawan">
                  <option>Super admin</option>
                  <option>Admin</option>
                  <option>Project Manager</option>
                  <option>Karyawan</option>
                </select>

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
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </form>

    </div><!-- /.modal-dialog -->

  </div><!-- /.modal -->

</div>
</div>

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
      ajax: {"url": "<?php echo base_url('master/karyawan_datatabel');?>", "type": "POST"},
      columns: 
      [

      {"data": "id_karyawan",
      "orderable": false},
      {"data": "nama_karyawan"},
      {"data": "username_karyawan"},
      {"data": "status_karyawan"},
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

function delete_karyawan(id)
{
  if(confirm('Are you sure delete this data?'))
  {
        // ajax delete data to database
        $.ajax({
          url : "<?php echo base_url('master/ajax_delete_karyawan')?>/"+id,
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

    function add_karyawan()
    {
      save_method = 'add';
    $('#modal_form1')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_add').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Add karyawan'); // Set Title to Bootstrap modal title
  }


  function edit_karyawan(id)
  {
    save_method = 'update';
    $('#modal_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo base_url('master/ajax_edit_karyawan/')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {

       $('[name="id"]').val(data.id_karyawan); 
       $('[name="nama_karyawan"]').val(data.nama_karyawan); 
       $('[name="username"]').val(data.username_karyawan); 
       $('[name="password"]').val(data.password_karyawan);
       $('[name="passwordlamareal"]').val(data.password_karyawan);
       $('[name="status_karyawan"]').val(data.status_karyawan);  
       $('[name="kondisi"]').val(data.kondisi_enum);  


          $('#modal_form_edit').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Karyawan'); // Set title to Bootstrap modal title

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
  }

  function save()
  {



    var add1 = $('#add1').val();
    var add2 = $('#add2').val();
    var add3 = $('#add3').val();
    var edit1 = $('#edit1').val();
    var edit2 = $('#edit2').val();

    if(save_method=='add'){
      if(add1==''||add3==''||add2=='')
      {
        alert('data tidak boleh kosong');
      }
      else
      {

    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
    var data;

    if(save_method == 'add') {
      url = "<?php echo site_url('master/ajax_add_karyawan')?>";
      data = $('#modal_form1').serialize();
    } else {
      url = "<?php echo site_url('master/ajax_update_karyawan')?>";
      data = $('#modal_form').serialize();
    }

    // ajax adding data to database
    $.ajax({
      url : url,
      type: "POST",
      data: data,

      dataType: "JSON",
      success: function(data)
      {

            if(data.status == 'TRUE') //if success close modal and reload ajax table
            {
              $('#modal_form_edit').modal('hide');
              $('#modal_form_add').modal('hide');
              reload_table();
               $('#btnSave').text('save'); //change button text
             }

             if(data.status == 'SALAH'){
               $('#btnSave').text('save'); //change button text
               alert('Password salah');
               $('#modal_form_edit').modal('hide');

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

else{

  if(edit1==''||edit2=='')
  {
    alert('nama & username tidak boleh kosong'); 
  }
  else{

      $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
    var data;

    if(save_method == 'add') {
      url = "<?php echo site_url('master/ajax_add_karyawan')?>";
      data = $('#modal_form1').serialize();
    } else {
      url = "<?php echo site_url('master/ajax_update_karyawan')?>";
      data = $('#modal_form').serialize();
    }

    // ajax adding data to database
    $.ajax({
      url : url,
      type: "POST",
      data: data,

      dataType: "JSON",
      success: function(data)
      {

            if(data.status == 'TRUE') //if success close modal and reload ajax table
            {
              $('#modal_form_edit').modal('hide');
              $('#modal_form_add').modal('hide');
              reload_table();
               $('#btnSave').text('save'); //change button text
             }

             if(data.status == 'SALAH'){
               $('#btnSave').text('save'); //change button text
               alert('Password salah');
               $('#modal_form_edit').modal('hide');

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








}

function reload_table(){
  tabeldata.api().ajax.reload(null,false);
}

</script>
