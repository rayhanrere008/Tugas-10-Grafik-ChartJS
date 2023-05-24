<?php
include('koneksicase.php');
$label =
["India","Japan","S. Korea","Turkey","Vietnam","Taiwan","Iran","Indonesia","Malaysia","Israel"];

for($id = 1;$id < 11;$id++)
{
    $query = mysqli_query($koneksicase,"select sum(TotalRecovered) as TotalRecovered from tb_casecorona where
    id='$id'");
     $row = $query->fetch_array();
     $total_recovered[] = $row['TotalRecovered'];
    }
?>
<!DOCTYPE html>
<html>
<head>
 <title>Line Chart Total Recovered</title>
 <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
 <div style="width: 800px;height: 800px">
  <canvas id="myChart"></canvas>
 </div>
 

 <script>
// Mengonversi data PHP menjadi format JSON
var data = <?php echo json_encode($total_recovered); ?>;

// Mengubah format data menjadi objek dataset Chart.js
var chartData = {
    labels: <?php echo json_encode($label); ?>,
    datasets: [{
        label: 'Grafik Total Recovered',
        data: <?php echo json_encode($total_recovered); ?>,
        backgroundColor: 'rgba(18, 0, 255, 0.2)',
        borderColor: 'rgba(18, 0, 255, 1)',
        borderWidth: 1
    }]
};

// Pengaturan chart
var options = {
    scales: {
        y: {
            beginAtZero: true
        }
    }
};

// Membuat line chart
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: chartData,
    options: options
});
</script>

</body>
</html>