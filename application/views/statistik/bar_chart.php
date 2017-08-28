
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
      <!-- /.box-header -->
      <div class="box-header with-border">
        <h3 class="box-title">Bar Chart</h3>
      </div>

      <div class="box-body">
        <div class="chart">

          <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        </div>
      </div>
      <h3 class="box-title">Catatan Laporan</h3>
      <!-- /.box-body -->
      <table id="mytable" class="table-responsive display" cellspacing="0" width="100%" >
        <thead>
          <tr>
           <th>No </th>
           <th>Nama Karyawan</th>
           <th>View</th>
         </tr>
       </thead>
     </table>
   </div>
   <!-- /.box-body -->
   <!-- /.box-footer -->
 </div>
 <!-- /.box -->
 <!-- Bootstrap modal -->
 <div class="modal fade" id="modal_form_edit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" style="color:red" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong>Tanggungan Project</strong></h4>
      </div>
      <div class="modal-body form">

        <form data-toggle="validator" id="modal_form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">

          <!-- Nama Project -->
          <ol id="body-view"></ol>

           
         </div><!-- /.modal-content -->
       </form>

     </div><!-- /.modal-dialog -->

   </div><!-- /.modal -->

 </div>
</div>

<script>
  $(function () { 
    Highcharts.chart('container', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Project yang dikerjakan dalam bulan '+<?php echo json_encode($bulan); ?>
      },
      subtitle: {
        text: 'Ditampilkan dalam 1 bulan terakhir'

      },
      xAxis: {
        categories: <?php echo json_encode($karyawan); ?>,
        crosshair: true
      },
      yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
          text: 'Jumlah Project'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.f} project</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        }
      },
      series: [{
        name: 'Banyak Project',
        data: <?php echo json_encode($count); ?>

      }]
    });

 //datatabel
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

    //datatabel 1
    t = $("#mytable").dataTable
    ({

      initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
        .on('.DT', function(e) {
          if (e.keyCode == 13) {
            api.search(this.value).draw();
          }
        })
        ;
      },
      oLanguage: {
        sProcessing: "loading..."
      },
      processing: true,
      serverSide: true,
      ajax: {
        url: "<?php echo base_url('statistik/bar_chart_laporan');?>", 
        type: "POST" , 
          // contentType: false,
          // processData: false,
        },
        columns: [
        {"data": "id_karyawan",
        "orderable": false},
        {"data": "nama_karyawan",
        "orderable": false},
        {"data": "view",
        "orderable": false}
        ],
        order: [[1, 'asc']],
        rowCallback: function(row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
          var index = page * length + (iDisplayIndex + 1);
          $('td:eq(0)', row).html(index);
        }

      });


});

function view_detail(id)
{
 
   // alert(id);

    $('#modal_form')[0].reset(); // reset form on modals

    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo base_url('statistik/bar_chart_laporan_detail')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        document.getElementById('body-view').innerHTML = "";
        var body = document.getElementById('body-view');
          for (var i = 0; i < data.output.length; i++) {

            var entry = document.createElement('li');
            entry.appendChild(document.createTextNode(data.output[i].nama_project));

            body.appendChild(entry);
            // console.log(data.output[i].nama_project);            
          };



       // $('[name="status"]').val(data.nama_project); 
       // var goreng = data.nama_project ;
       // alert(goreng);

// 
          $('#modal_form_edit').modal('show'); // show bootstrap modal when complete loaded

       //    },
       //    error: function (jqXHR, textStatus, errorThrown)
       //    {
       //      alert('Error get data from ajax');
       //    }
     }
    });
}

</script>
