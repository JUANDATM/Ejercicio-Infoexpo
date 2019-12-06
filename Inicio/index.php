<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USUARIOS</title>
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../css/dataTables.materialize.css"/>
    <link type="text/css" rel="stylesheet" href="../css/default.css"/>
    <link rel="icon" type="image/x-icon" href="../fonts/favicon.ico" />
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-s12">
        <div class="card" aling="center">
            <div class="card-content">
                <span class="card-title" align="center">DEMO INFOEXPO</span>


                <div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Como Quires Ver el Demo?</span>
          <p></p>
        </div>
        <div class="card-action">
          <a href="../Empresas/index.php">Entrar Como Admin</a>
          <a href="../Empresas/indexx.php">Entrar Como Usuario</a>
        </div>
      </div>
    </div>
  </div>




            </div>
        </div>
    </div>
</div>
</div>
<?php include_once("../resources/html/footer.php"); ?>

<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.materialize.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.min.js"></script> 
    <script type="text/javascript" src="./Valida.js"></script>    
    <script type="text/javascript">
        $(document).ready(function(){
            $('select').formSelect();
            $('.sidenav').sidenav();
            $(".dropdown-trigger").dropdown();
        });
    </script> 
</body>
</html>