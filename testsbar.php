<?php
include('koneksicase.php');
$label =
["India","Japan","S. Korea","Turkey","Vietnam","Taiwan","Iran","Indonesia","Malaysia","Israel"];

for($id = 1;$id < 11;$id++)
{
    $query = mysqli_query($koneksicase,"select sum(TotalTests) as TotalTests from tb_casecorona where
    id='$id'");
     $row = $query->fetch_array();
     $total_tests[] = $row['TotalTests'];
    }
?>
<!DOCTYPE html>
<html>
<head>
 <title>Grafik Bar Total Tests</title>
 <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
 <div style="width: 800px;height: 800px">
  <canvas id="myChart"></canvas>
 </div>
 

 <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
   type: 'bar',
   data: {
    labels: <?php echo json_encode($label); ?>,
    datasets: [{
     label: 'Grafik Total Tests',
     data: <?php echo json_encode($total_tests); ?>,
     backgroundColor: 'rgba(255, 0, 174, 0.2)',
     borderColor: 'rgba(255, 0, 174, 0.72)',
     borderWidth: 1
    }]
   },
   options: {
    scales: {
     yAxes: [{
      ticks: {
       beginAtZero:true
      }
     }]
    }
   }
  });
 </script>
</body>
</html>