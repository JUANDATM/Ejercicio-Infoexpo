<?php
      include_once("../Utilerias/BaseDatos.php");
      $company = consultaEmpresa();
      foreach ($company as $tupla){
          $idcompany=$tupla['idcompany'];  
          $namecompany = $tupla['namecompany'];
          $address = $tupla['address'];
          $description = $tupla['description'];
          $visits = $tupla['visits'];
          echo "<tr id='$idcompany'><td>$idcompany</td><td>$namecompany</td><td>$address</td><td>$description</td><td>$visits</td><td></td><td>
<i class='material-icons edit' data-idcompany ='$idcompany' data-namecompany='$namecompany' data-address='$address'  data-description='$description' data-visits=''>create</i>
<i class='material-icons delete' data-idcompany ='$idcompany'>delete_forever</i></td></tr>";
      }
?>