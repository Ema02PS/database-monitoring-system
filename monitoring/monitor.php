<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>BoxCorp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<!-- id="backToLoginButton" -->

<body>
  <!-- partial:index.partial.html -->
  <div class="ct" id="t1">
  <div class="ct" id="t2">
  <div class="ct" id="t3">
  <div class="ct" id="t4">
  <div class="ct" id="t5">
  <section>  
    <ul style="margin-bottom: 16%;">
      <a href="#t1"><li class="icon fa fa-home" id="uno" title="Home"></li></a>
      <a href="#t2"><li class="icon fa fa-line-chart" id="dos" title="SGA"></li></a>
      <a href="#t3" onclick="crearTBLS(); crearTBLSBarras();"><li class="icon fa fa-pie-chart" id="tres" title="Tablespace"></li></a>
      <a href="#t4"><li class="icon fa fa-table" id="cuatro" title="Redolog"></li></a>
      <a href="#t5"><li class="icon fa fa-refresh" id="cinco" title="Backup"></li></a>
      <a href="../index.php"><li  class="icon fa fa-backward" id="seis" title="Login"></li></a>
    </ul> 
      <div class="page" id="p1">
        <br>
        <br>
        <br>
        <br>
        <li class="icon">
          <span class="title">
            <img src="../images/BoxCorp_Logo.png" width="100%">
          </span>
          <!-- <span class="hint">Like this pen to see the magic!...<br/> 
          Just kidding, it won't happen anything but I'll be really happy If you do so.</span> -->
          <h2>Database Monitoring Software</h2>
          <h4>Provided by ©BoxCorp</h3>
        </li>
      </div>

      <div class="page" id="p2">
        <?php
          include './sga/lines.php'
        ?>
      </div>

      <div class="page" id="p3">
        <?php
        include './tablespaces/tablespaces.php'
        ?>
      </div>

      <div class="page" id="p4">
        <div>
          <?php
            include './redolog/redolog.php'
          ?>
        </div>
      </div>

      <div class="page" id="p5">
        <div>
        <?php
        include './backup/backup.php'
        ?>
        </div>
      </div>
  </section>
  </div>
  </div>
  </div>
  </div>
  </div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../js/monitoring.js"> </script>
<!-- partial -->
</body>
</html>