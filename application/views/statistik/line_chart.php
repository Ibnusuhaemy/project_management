
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
        <h3 class="box-title">Line Chart</h3>
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
</div>
<!-- /.col -->

<script>
  $(function () { 
      var myChart = Highcharts.chart('container', {
      chart: {
        type: 'line'
      },
      title: {
        text: 'Statistik Project Baru'
      },
      subtitle: {
        text: 'ditampilkan 5 bulan terakhir <br>'+<?php echo json_encode($text) ?>
      },
      xAxis: {
        categories: <?php echo json_encode($bulan); ?>
        // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      },
      yAxis: 
      { allowDecimals: false,
        title: {
          text: ''
        }
      },
      plotOptions: {
        line: {
          dataLabels: {
            enabled: true
          },
          enableMouseTracking: false
        }
      },
      series: [{
        name: 'bulan',
        data: <?php echo json_encode($count); ?>
        //data: [7.0, 6.9]

      }, ]
    });


  });


</script>
