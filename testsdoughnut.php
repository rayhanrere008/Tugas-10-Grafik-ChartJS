<?php
include('koneksicase.php');
$negara = mysqli_query($koneksicase,"select * from tb_casecorona");
while($row = mysqli_fetch_array($negara)){
	$nama_negara[] = $row['CountryOther'];
	
	$query = mysqli_query($koneksicase,"select sum(TotalTests) as TotalTests from tb_casecorona where id='".$row['id']."'");
	$row = $query->fetch_array();
	$total_tests[] = $row['TotalTests'];
}
?>
<!doctype html>
<html>

<head>
	<title>Doughnut Chart Total Tests</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>

<body>
	<div id="canvas-holder" style="width:50%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($total_tests); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 69, 0, 0.2)',
					'rgba(34, 139, 34, 0.2)',
					'rgba(173, 255, 48, 0.2)',
					'rgba(62, 254, 255, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 0, 0.2)'

					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255, 69, 0, 1)',
					'rgba(34, 139, 34, 1)',
					'rgb(173, 255, 48, 1)',
					'rgba(62, 254, 255, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 0, 1)'
					],
					label: 'Presentase Total Tests'
				}],
				labels: <?php echo json_encode($nama_negara); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>

</html>