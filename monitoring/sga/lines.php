<br>

<link rel="stylesheet" href="../css/style.css" type="text/css">


<div class="monitor-titulo">
    <p style="font-size: 22px;">System Global Area</p>
</div>

<?php
 
$dataPoints = array();
$y = 0;
$hw =8;
for($i = 0; $i < 10; $i++){ //Estas son las veces que grafica (osea el numero de puntos que hay en el grafico)
	$y = rand(0, 10);  //Aqui es donde Y toma su nuevo valor, para añadir otro punto en la grafica
	array_push($dataPoints, array("x" => $i, "y" => $y));
}
 
?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer1", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	animationEnabled: true,
	zoomEnabled: true,
	title: {
		text: "SGA Consume"
	},
	data: [{
    color: "red",
		type: "area",     
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<div class="icon" id="chartContainer1" style="height: 190px; 
  width: 80%; 
  margin-left: 5%;
  margin-right: 5%; ">
</div>
  
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<!-- Querys executed after Hw Info -->
 <div style="display: flex; margin-left:2%; margin-top:0.5%;">
 <img src="../images/sirena.png" width="2.5%">
</div>
 
<div>
<h5 style="margin-left: 33%; margin-top:0.5%;">Querys executed after HWM Info</h5>
<table style="border: 1px solid black; text-align: center; height: 20px; 
  width: 80%; 
  margin-left: 5%;
  margin-right: 5%; ">
  <thead>
    <tr style="border: 1px solid white; text-align: center;">
      <th style="border: 1px solid white; text-align: center; background-color: #5951ad">User</th>
      <th style="border: 1px solid white; text-align: center; background-color: #5951ad">Date</th>
      <th style="border: 1px solid white; text-align: center; background-color: #5951ad">Time</th>
      <th style="border: 1px solid white; text-align: center; background-color: #5951ad">Query</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">SYS</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">11/18/22</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">01:43</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">select * from v$sgainfo</td>
    </tr>

    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">USER01</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">11/18/22</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">01:45</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">select * from Persons</td>
    </tr>

    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">USER01</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">11/18/22</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">01:48</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">select * from Citas</td>
    </tr>

    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">SYS</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">11/18/22</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">01:54</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">CREATE TABLESPACE rman_ts DATAFILE ‘RMAN_TS.DAT’ SIZE 1000M ONLINE;</td>
    </tr>

    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">DBA</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">11/18/22</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">01:43</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">select b.tablespace_name, tbs_size SizeMb  from (select tablespace_name, sum(bytes)/1024/1024 as tbs_size from dba_data_files group by tablespace_name) b</td>
    </tr>

    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">rman_user</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">11/18/22</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">01:43</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6860be">$ RMAN target / catalog rman_user</td>
    </tr>
  </tbody>
  <!-- <tfoot>
    <tr>
      <td>Sum</td>
      <td>$180</td>
    </tr>
  </tfoot> -->
</table>
</div>