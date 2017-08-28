
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
        <h3 class="box-title">Pie Chart</h3>
      </div>

      <div class="box-body">
        <div class="chart">

          <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        </div>

       

     </div>
     <!-- /.box-body -->
   </div>
   <!-- /.box-footer -->
 </div>
 <!-- /.box -->
 <!-- /.col -->

 <script>

  $(document).ready(function () {

    // Build the chart
    Highcharts.chart('container', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
      },
      title: {
        text: 'Presentase Project berdasarkan kategori bulan '+<?php echo json_encode($bulan); ?>
      },
      subtitle: {
        text: 'Ditampilkan dalam 1 bulan terakhir'

      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.y:.1f}%</b> <br> Jumlah : <b>{point.count:.f}</b> '
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: false
          },
          showInLegend: true
        }
      },
      series: [{
        name: 'Presentase',
        colorByPoint: true,
        data: <?php echo json_encode($result); ?>,
      }]
    });
  });


 



</script>
