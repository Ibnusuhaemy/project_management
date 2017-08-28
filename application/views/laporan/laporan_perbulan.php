


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
        <h3 class="box-title">Data Project</h3>

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
            <div class="box-body">

              <form method="POST" class="form-horizontal" id="form" >  

                <div class="col-sm-3 col-sm-push-2" style="padding-bottom: 10px">
                  <select class="form-control" id="perbulan">
                    <option value="00">Semua bulan </option>
                    <option value="01">Januari </option>
                    <option value="02">Februari </option>
                    <option value="03">Maret </option>
                    <option value="04">April </option>
                    <option value="05">Mei </option>
                    <option value="06">Juni </option>
                    <option value="07">Juli </option>
                    <option value="08" selected>Agustus </option>
                    <option value="09">September </option>
                    <option value="10">Oktober </option>
                    <option value="11">November </option>
                    <option value="12">Desember </option>
                  </select>
                </div>

                <div class="col-sm-3 col-sm-push-2" style="padding-bottom: 10px">
                  <select class="form-control" id="pertahun">
                    <option value="00">Semua tahun </option>
                    <option value="2016">2016 </option>
                    <option value ="2017" selected>2017 </option>
                    <option value="2018">2018 </option>
                    <option value="2019">2019 </option>
                    <option value="2020">2020 </option>
                  </select>
                </div>

                <div class="col-sm-2 col-sm-push-2 col-xs-6" >
                  <button type="button" class="btn btn-primary col-xs-12" id="lihat" onclick="update()">TAMPILKAN</button>
                </div>

                
              </form>
              <br>
              <br>
              </div>

              <div id="test" style="display: none">

                <h3 class="box-title">Project</h3>
                <hr>
                

                <table id="mytable" class="table-responsive display" cellspacing="0" width="100%" >
                  <thead>
                    <tr>
                     <th>No </th>
                     <th>No Project</th>
                     <th>Nama Project</th>
                     <th>Status Project</th>
                     <th>Nama Kategori Client</th>
                     <th>Tanggal Mulai</th>
                     <th>Tanggal Selesai</th>


                   </tr>
                 </thead>
               </table>

               <h3 class="box-title">Project berdasarkan status</h3>
               <hr>

               <!-- NEW SKIN 2 -->
               <div class="row">

                 <div class="col-lg-4 col-xs-6">
                   <!-- small box -->
                   <div class="small-box bg-green">
                     <div class="inner">
                       <h3 id="selesai-box"></h3>

                       <p>Selesai</p>
                     </div>
                     <div class="icon">
                       <i class="fa fa-area-chart"></i>
                     </div>
                     
                   </div>
                 </div>

                 <div class="col-lg-4 col-xs-6">
                   <!-- small box -->
                   <div class="small-box bg-yellow">
                     <div class="inner">
                       <h3 id="proses-box"></h3>

                       <p>Proses</p>
                     </div>
                     <div class="icon">
                       <i class="fa fa-area-chart"></i>
                     </div>
                     
                   </div>
                 </div>

                 <div class="col-lg-4 col-xs-6">
                   <!-- small box -->
                   <div class="small-box bg-orange">
                     <div class="inner">
                       <h3 id="review-box"></h3>

                       <p>Review</p>
                     </div>
                     <div class="icon">
                       <i class="fa fa-area-chart"></i>
                     </div>
                     
                   </div>
                 </div>

                 <div class="col-lg-4 col-xs-6">
                   <!-- small box -->
                   <div class="small-box bg-purple">
                     <div class="inner">
                       <h3 id="tertunda-box"></h3>

                       <p>Tertunda</p>
                     </div>
                     <div class="icon">
                       <i class="fa fa-area-chart"></i>
                     </div>
                     
                   </div>
                 </div>

                 <div class="col-lg-4 col-xs-6">
                   <!-- small box -->
                   <div class="small-box bg-red">
                     <div class="inner">
                       <h3 id="batal-box"></h3>

                       <p>Batal</p>
                     </div>
                     <div class="icon">
                       <i class="fa fa-area-chart"></i>
                     </div>
                     
                   </div>
                 </div>

                 <div class="col-lg-4 col-xs-6">
                   <!-- small box -->
                   <div class="small-box bg-blue">
                     <div class="inner">
                       <h3 id="total-box"></h3>

                       <p>Total</p>
                     </div>
                     <div class="icon">
                       <i class="fa fa-area-chart"></i>
                     </div>
                     
                   </div>
                 </div>


               </div>
               <!-- NEW SKIN -->

              <!-- <table id="mytable1" class="table-responsive display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Status Project</th>
                    <th>Jumlah</th>


                  </tr>
                </thead>
              -->

            </table>

            <h3 class="box-title">Beban Project Karyawan</h3>
            <hr>


            <table id="mytable2" class="table-responsive display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Karyawan</th>
                  <th>Nama Project</th>
                  <th>Kategori Client</th>
                  <th>Status Project</th>


                </tr>
              </thead>


            </table>

          </div>


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

<script type="text/javascript">


 function update()
 {


  $('#test').show();
  $('#mytable').DataTable().destroy();
  $('#mytable1').DataTable().destroy();
  $('#mytable2').DataTable().destroy();
  var formData = new FormData($('#form')[0]);

      //get perbulan berdasarkan id
      var perbulan = $('#perbulan :selected').val();
      var pertahun = $('#pertahun :selected').val();

     // alert('Perbulan'+perbulan);
     
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
        url: "<?php echo base_url('laporan/laporanBulanJson');?>", 
        type: "POST" , 
        data: { vbulan: perbulan ,vtahun: pertahun },
          // contentType: false,
          // processData: false,
        },
        columns: [
        {"data": "id_project",
        "orderable": false},
        {"data": "no_project"},
        {"data": "nama_project"},
        {"data": "nama_status"},
        {"data": "nama_kategori_client"},
        {"data": "tanggal_mulai"},
        {"data": "tanggal_selesai"}
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


//datatabel 2
// t1 = $("#mytable1").dataTable
// ({

//   initComplete: function() {
//     var api = this.api();
//     $('#mytable_filter input')
//     .on('.DT', function(e) {
//       if (e.keyCode == 13) {
//         api.search(this.value).draw();
//       }
//     })
//     ;
//   },

//   oLanguage: {
//     sProcessing: "loading..."
//   },
//   processing: true,
//   serverSide: true,

//   ajax: {
//     url: "<?php echo base_url('laporan/laporanSummaryJson');?>", 
//     type: "POST" , 
//     data: { vbulan: perbulan ,vtahun: pertahun },
//   },
//   columns: [
//   {"data": "id"},
//   {"data": "nama"},
//   {"data": "jumlah"}
//   ],
//   order: [[1, 'asc']],
//   rowCallback: function(row, data, iDisplayIndex) {
//     var info = this.fnPagingInfo();
//     var page = info.iPage;
//     var length = info.iLength;
//     var index = page * length + (iDisplayIndex + 1);
//     $('td:eq(0)', row).html(index);
//   }

// });

//datatabel 2.1
// t1 = $("#mytable1").dataTable
// ({

//   initComplete: function() {
//     var api = this.api();
//     $('#mytable_filter input')
//     .on('.DT', function(e) {
//       if (e.keyCode == 13) {
//         api.search(this.value).draw();
//       }
//     })
//     ;
//   },
//   oLanguage: {
//     sProcessing: "loading..."
//   },
//   processing: true,
//   serverSide: true,

//   ajax: {
//     url: "<?php echo base_url('laporan/laporanSummaryJson');?>", 
//     type: "POST" , 
//     data: { vbulan: perbulan ,vtahun: pertahun },
//   },
//   columns: [
//   {"data": "id"},
//   {"data": "nama"},
//   {"data": "jumlah"}
//   ],
//   order: [[1, 'asc']],
//   rowCallback: function(row, data, iDisplayIndex) {
//     var info = this.fnPagingInfo();
//     var page = info.iPage;
//     var length = info.iLength;
//     var index = page * length + (iDisplayIndex + 1);
//     $('td:eq(0)', row).html(index);
//   }

// });

//Laporan Summary new Version
$.ajax({
  url : "<?php echo base_url('laporan/laporanSummaryJson2')?>/",
  type: "POST",
  data: { vbulan: perbulan ,vtahun: pertahun },
  dataType: "JSON",
  success: function(data)
  {

    //hapus dulu
    document.getElementById('selesai-box').innerHTML = "";
    document.getElementById('proses-box').innerHTML = "";
    document.getElementById('review-box').innerHTML = "";
    document.getElementById('tertunda-box').innerHTML = "";
    document.getElementById('batal-box').innerHTML = "";
    document.getElementById('total-box').innerHTML = "";


    var selesai = document.getElementById('selesai-box');
    var proses = document.getElementById('proses-box');
    var review = document.getElementById('review-box');
    var tertunda = document.getElementById('tertunda-box');
    var batal = document.getElementById('batal-box');
    var total = document.getElementById('total-box');

    for (var i = 0; i < data.output.length; i++) 
    {
      var newDiv = document.createElement('h3');
      var textDiv = document.createTextNode(data.output[i].jumlah);
      newDiv.appendChild(textDiv);

      if(i==0){
        selesai.appendChild(newDiv);
      }
      if(i==1){
        proses.appendChild(newDiv);
      }
      if(i==2){
        review.appendChild(newDiv);
      }
      if(i==3){
        tertunda.appendChild(newDiv);
      }
      if(i==4){
        batal.appendChild(newDiv);
      }
    }

    var newDiv1 = document.createElement('h3');
    var textDiv1 = document.createTextNode(data.total[0].jumlah);
    newDiv1.appendChild(textDiv1);
    total.appendChild(newDiv1);


       }     // console.log(data.output[i].nama_project);            
     });


//datatabel 3
t2 = $("#mytable2").dataTable
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
    url: "<?php echo base_url('laporan/laporanBebanProjectJson');?>", 
    type: "POST" , 
    data: { vbulan: perbulan ,vtahun: pertahun },
  },
  columns: [
  {"data": "id_transaksi"},
  {"data": "nama_karyawan"},
  {"data": "nama_project"},
  {"data": "nama_kategori_client"},
  {"data": "nama_status_project"}
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




}
</script>