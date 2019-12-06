<?php 
include_once("/Utilerias/BaseDatos.php");
$fill = consultaTypeuser();
      foreach ($fill as $tupla){
          $idtypeuser=$tupla['idtypeuser'];  
          $nametypeuser = $tupla['nametypeuser'];
          echo"<option value='$idtypeuser'>$nametypeuser</option>";
      }
      ?>