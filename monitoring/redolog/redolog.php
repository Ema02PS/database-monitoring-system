<br>
<div class="monitor-titulo">
    <p class="title">Redo Logs</p>
</div>

<!-- table content -->
<section class="redo-color" >
  <br>
  <div class="tabla">
    <table id="tablalogs">
      <tr id="Grupos"></tr>
      <tr id="Logs"></tr>
    </table>
  </div>
</section>
  <!-- other content -->
<br>
<section class="redo-color">
  <div>
    <!-- <h3>Aquí va el resto de la información</h3> -->
    <!-- <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa adipisci maiores corrupti, voluptatibus accusantium facilis assumenda tempora quisquam quibusdam ullam molestiae, impedit eos sunt ipsa alias magnam ut sed animi.
    </p> -->
  </div>
</section>

<?php
$c = oci_pconnect("ANA", "ANA", "localhost/XE");
$s = oci_parse($c, 'select group# grupo,members cantidad,status estado from v$log');
oci_execute($s);

$redologS = array();
// $size = array();
while (($row = oci_fetch_array($s, OCI_BOTH )) != false) {

  $redolog = array("grupo"=> $row['GRUPO'], "cantidad"=> $row['CANTIDAD'], "estado"=> $row['ESTADO']);
  
  
  //$tblspace = array("label"=> $row['TABLESPACE_NAME'],"y"=>$row['SIZEMB']);
  array_push($redologS, $redolog);
  // array_push($size, $row['SIZEMB']);
}
// print_r($redologS); 
$cantidad = count($redologS);
//print_r($cantidad); 
$current = array_search('CURRENT', array_column($redologS, 'estado'));
// print_r($current); 

?>

<!-- Aqui estoy generando el grafico -->
<script>
      
const FILA_LOGS = document.getElementById("Logs");
const FILA_GRUPOS= document.getElementById("Grupos");
const NUMERO_LOGS = <?php echo json_encode($cantidad);?>;
const TODOS_LOGS = <?php echo json_encode($redologS);?>;

console.log(NUMERO_LOGS);
  console.log("AGREGANDO GRAFICO DE LOGS");
    console.log(TODOS_LOGS.length);

//numero logs variable luego se tiene que llenar con la cantidad de registros que se devuelvan (creo)
current = 0;

// un for mete la cantidad de grupos que hay
//Deberian de haber igual numero de grupos que de logs, entonces uso la misma variable
for(i = 0; i < TODOS_LOGS.length; i++){
    FILA_GRUPOS.innerHTML += 
    `
    <th style="width: 10%; text-align: center;">Group ${i + 1}</th>
    `;
}
//Meto los logs que hay por grupo
for(i = 0; i < TODOS_LOGS.length; i++){
  if (TODOS_LOGS[i].estado === "CURRENT") {
    FILA_LOGS.innerHTML +=
    `
    <td class="bg-success" id="redo" value="current" style="text-align: center;">REDO ${i + 1}</td>
    `;
  }
  else {
    FILA_LOGS.innerHTML +=
      `
      <td class="bg-danger" id="redo" value="inactive" style="text-align: center;">REDO ${i + 1}</td>
      `;
  }

}
//Aun no se como meter los espejos

/*Los espejos son mas complicados, porque puede
haber un grupo que tenga mas espejos que otro y para acomdar 
eso en tabla hay que hacer un metodo for con varias comparaciones
y validaciones*/

</script>

<div>
<table style="width: 65%; margin-left:13%;">
  <thead>
    <tr>
      <th style="border: 1px solid white; text-align: center; background-color: #5951ad">Tablespace</th>
      <th style="border: 1px solid white; text-align: center; background-color: #5951ad">Status</th>
      <th style="border: 1px solid white; text-align: center; background-color: #5951ad">Switch frequency</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">REDO01</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">Active</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">30 minutes</td>
    </tr>
    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">REDO02</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">Current</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">30 minutes</td>
    </tr>
    <tr>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">REDO03</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">Inactive</td>
      <td style="border: 1px solid white; text-align: center; background-color: #6159b8">30 minutes</td>
    </tr>
  </tbody>
</table>
</div>