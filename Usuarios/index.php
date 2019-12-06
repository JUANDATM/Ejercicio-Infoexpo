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
<?php
include_once("../resources/html/header.php");        
?>
<div class="container">
    <div class="row">
        <div class="col s12 ">
            <div class="card">
                <a id="add" class="btn-floating btn-large waves-effect waves-light right blue lighten-2">
                    <i class="material-icons">add</i>
                </a>
                <div class="card-content">
                    <span class="card-title">Usuarios</span>
                    <table id="dtTable" class="highlight bordered dataTable">
                        <thead>
                            <tr><th>Id Usuarios</th><th>Correo:</th><th>Contraseña</th><th>Tipo Usuario</th><th></th></tr>
                        </thead>
                        <tbody>
                            <?php 
                                include_once("./CargaTabla.php");  
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
</div>
<!--                        Ventana Modal               --> 
<div id="ventanaModal" class="modal">
    <div class="modal-content">
        <h4>Usuarios</h4>
        <br>
        <form id="formulario" method="post">
            <div class="row">
                <div class="input-field_col_s12">
                    <input type="hidden" name="iduser" id="iduser">
                    <input type="email" name="emailuser" id="emailuser" class="validate">
                    <label for="emailuser">Email:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field_col_s12">
                    <input type="password" name="passworduser" id="passworduser" class="validate">
                    <label for="passworduser">Contraseña : </label>
                </div>
            <div class="row"> 
                <div class="input-field col s12">
                <select name="idtypeuserf" id="idtypeuserf" >
                    <?php
                    include_once("./llenausuario.php");
                    ?>
                </select>
                     <label for="idtypeuserf"> Tipo Usuario</label>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a id="guardar" class="modal-action waves-effect waves-green btn-flat">Guardar</a>
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