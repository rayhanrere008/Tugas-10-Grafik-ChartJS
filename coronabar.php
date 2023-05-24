<?php
include('koneksicase.php');
$label =
["India","Japan","S. Korea","Turkey","Vietnam","Taiwan","Iran","Indonesia","Malaysia","Israel"];

for($id = 1;$id < 11;$id++)
{
    $query = mysqli_query($koneksicase,"select sum(TotalCases) as TotalCases from tb_casecorona where
    id='$id'");
     $row = $query->fetch_array();
     $total_cases[] = $row['TotalCases'];
    }
?>
<!DOCTYPE html>
<html>
<head>
 <title>Grafik Total Cases 10 Negara</title>
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
     label: 'Grafik Total Cases 10 Country',
     data: <?php echo json_encode($total_cases); ?>,
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