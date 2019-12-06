<?php
      include_once("../Utilerias/BaseDatos.php");
      $user = consultaUsuario();
      foreach ($user as $tupla){
          $iduser=$tupla['iduser'];  
          $emailuser = $tupla['emailuser'];
          $passworduser = $tupla['passworduser'];

          $nametypeuser = $tupla['nametypeuser'];
          echo "<tr id='$iduser'><td>$iduser</td><td>$emailuser</td><td>$passworduser</td><td>$nametypeuser</td><td>
<i class='material-icons edit' data-iduser ='$iduser' data-emailuser='$emailuser' data-passworduser='$passworduser'  data-nametypeuser='$nametypeuser'>create</i>
<i class='material-icons delete' data-iduser ='$iduser'>delete_forever</i></td></tr>";
      }
?>