<canvas id="myChart"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<?php
foreach($data as $data){
	$name[] = $data->name;
	$qty[] = (float) $data->qty;
}
?>
<script>var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
type: 'radar',

// The data for our dataset
data: {
labels: <?php echo json_encode($name);?>,
datasets: [{
label: "Data Produk yang jual",
backgroundColor: 'rgb(244, 66, 66)',
borderColor: 'rgb(244, 66, 66)',
data: <?php echo json_encode($qty);?>
}]
},

// Configuration options go here
options: {}
});
</script>
