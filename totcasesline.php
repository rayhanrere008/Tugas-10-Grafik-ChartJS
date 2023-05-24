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
 <title>Line Chart Total Cases</title>
 <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
 <div style="width: 800px;height: 800px">
  <canvas id="myChart"></canvas>
 </div>
 

 <script>
// Mengonversi data PHP menjadi format JSON
var data = <?php echo json_encode($total_cases); ?>;

// Mengubah format data menjadi objek dataset Chart.js
var chartData = {
    labels: <?php echo json_encode($label); ?>,
    datasets: [{
        label: 'Grafik Total Cases',
        data: <?php echo json_encode($total_cases); ?>,
        backgroundColor: 'rgba(245, 143, 39, 0.2)',
        borderColor: 'rgba(245, 143, 39, 1)',
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