<br>


<!-- Preguntando a la DB para obtener los datos -->
<?php
$c = oci_pconnect("ANA", "ANA", "localhost/XE"); //conexion a la base de datos
// $s = oci_parse($c, 'select name n, bytes b from v$sgainfo'); //ejecucion del Query que me devuelve los tablespace y su espacio

$s = oci_parse($c, 'select b.tablespace_name, tbs_size SizeMb  from (select tablespace_name, sum(bytes)/1024/1024 as tbs_size from dba_data_files group by tablespace_name) b'); //ejecucion del Query que me devuelve los tablespace y su espacio

oci_execute($s);

//Datos quemados que sirvieron para hacer pruebas
// $dataPoints2 = array( 
//     array("label"=>"Sys", "y"=>64.02),
//     array("label"=>"SysAux", "y"=>12.55),
//     array("label"=>"Users", "y"=>8.47),
//     array("label"=>"TEMP", "y"=>6.08),
//     array("label"=>"UNDO", "y"=>4.29),
//     array("label"=>"Others", "y"=>4.59)
// );

//En este array se van a almacenar todos los datos que recupere
$tablespaces = array();
$size = array();
while (($row = oci_fetch_array($s, OCI_BOTH )) != false) {

  //Este array representa un solo tablespace
  //N es el nombre del tablespace
  //B es un tamanio en Bytes
  $tblspace = array("label"=> $row['TABLESPACE_NAME'],"y"=>$row['SIZEMB']);
  array_push($tablespaces, $tblspace);
  array_push($size, $row['SIZEMB']);

  //Pruebas fallidas pero utiles

  //array_push($dataPoints,"label"=>$row['N'], "y"=>$row['B']);
  //array_push($dataPoints,"label"=> $row['N'], "y"=> $row['B']);
  // array_push($dataPoints,"label"=> $row['N'],"y"=>$row['B']);



}

//----------IMPORTANTE!!!-------------
//descomentar esto si se quiere saber que recupero el array y como esta hecho ----
// print_r($tablespaces); 
//print_r($size); 

oci_free_statement($s);
oci_close($c); //Cierra la conexion para no desperdiciar recursos

?>

<script>
//Recibieno el POJO del localStorage para probar
let loginData = localStorage.getItem('loginData')
JSON.parse(loginData)
console.log(loginData)

var tablespacesJs = <?php echo json_encode($tablespaces);?>;
function totalTlS(tablespaces){
  let total = 0;
  tablespaces.forEach(tls => { total += parseInt(tls[1].y)});
  return total;
}

//AQUI
var sizes =  <?php echo json_encode($size);?>;
var parsedSizes = sizes.map(s => { return parseInt(s) });
var total = 0;
total = parsedSizes.reduce((previousValue, currentValue) => previousValue + currentValue, 0);

</script>

<!-- Esta creando el grafico circular -->
<script>
function crearTBLS() {
    console.log("Creando grafico de SGA");
    
var chart = new CanvasJS.Chart("chartContainer2", {
  animationEnabled: true,
  theme: "light2",
  title: {
    text: "Total Size: " + total + " MB"
   },
  data: [{
    type: "pie",
    yValueFormatString: "###0\"\"" + "MB",
    indexLabel: "{label} ({y})",
    dataPoints: <?php echo json_encode($tablespaces, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
}
</script>


<div style="display: flex;">
<!-- Este div pone el grafico circular -->
<div class="icon" id="chartContainer2" 
  style="height: 280px; 
  width: 35%; 
  margin-left: 2%;
  margin-right: 2%;">
</div>

<!-- Tabla de la derecha -->

<div style="margin-left:2%; width: 80%;">

<div class="monitor-titulo" style="margin-right:14%;">
    <p style="font-size: 24px;">Tablespace memory usage</p>
</div>

  <table style="width: 80%;">
  <thead>
    <tr>
      <th style="border: 1px solid white; text-align: center; background-color: #5951ad">Tablespace</th>
      <th style="border: 1px solid white; text-align: center; background-color: #5951ad">Growth rate</th>
      <th style="border: 1px solid white; text-align: center; background-color: #5951ad">Days until full</th>
      <th style="border: 1px solid white; text-align: center; background-color: #5951ad">HWM</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">SYSTEM</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">22 MB/day</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">76 days left</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">1030 MB</td>
    </tr>
    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">SYSAUX</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">14 MB/day</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">35 days left</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">560 MB</td>
    </tr>
    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">USERS</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">0.2 MB/day</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">2 days left</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">4 MB</td>
    </tr>
    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">UNDO</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">3 MB/day</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">23 days left</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">90 MB</td>
    </tr>
    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">RMAN_TS</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">3 MB/day</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">135 days left</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">920 MB</td>
    </tr>
    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">A1</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">8 MB/day</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">10 days left</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">80 MB</td>
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


</div>

<!-- GRAFICO DE BARRAS APILADAS -->

<?php
 
$used = array(
	array("label"=> "SYSTEM", "y"=> 51),
	array("label"=> "SYSAUX", "y"=> 41),
	array("label"=> "USERS", "y"=> 38),
	array("label"=> "UNDO", "y"=> 45),
	array("label"=> "TEMP", "y"=> 34),
	array("label"=> "RMAN_TS", "y"=> 28),
  array("label"=> "A1", "y"=> 28)
);
 
$free = array(
	array("label"=> "SYSTEM", "y"=> 49),
	array("label"=> "SYSAUX", "y"=> 30),
	array("label"=> "USERS", "y"=> 25),
	array("label"=> "UNDO", "y"=> 17),
	array("label"=> "TEMP", "y"=> 19),
	array("label"=> "RMAN_TS", "y"=> 26),
	array("label"=> "A1", "y"=> 19)
);
 
	
?>
<script>
function crearTBLSBarras() {
 
var chart = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Used and free space per tablespace"
	},
	axisX:{
		reversed: true
	},
	axisY:{
		includeZero: true
	},
	toolTip:{
		shared: true
	},
	data: [{
		type: "stackedBar",
		name: "Used",
		dataPoints: <?php echo json_encode($used, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "stackedBar",
		name: "Free",
		dataPoints: <?php echo json_encode($free, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>



<div class="icon" id="chartContainer3"  style="height: 250px; 
  width: 85%;
  margin-top:1%;
  margin-left: 2%;
  margin-right: 5%;">
</div>

<!-- <div class="icon" id="chartContainer2" 
  style="height: 370px; 
  width: 60%; 
  margin-left: 15%;
  margin-right: 5%;">
</div> -->


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<!-- DATITOS QUEMADITOS -->
<!-- Del grafico de barras -->
