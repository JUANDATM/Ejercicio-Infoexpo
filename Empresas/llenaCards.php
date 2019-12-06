<?php 
include_once("../Utilerias/BaseDatos.php");
$fill = ConsultaEmpressa();
      foreach ($fill as $tupla){
        $idcompany=$tupla['idcompany'];  
          $namecompany=$tupla['namecompany'];  
          $description = $tupla['description'];
          $address = $tupla['address'];
          $visits= $tupla['visits'];
          echo"<div class='row col s12 m4'>
                 <div id ". $idcompany."class='s6 m3'>
                    <div class='card' >
                       <div class='card-image waves-effect waves-block waves-light'>
                          <img class='' src='images/office.jpg'>
                       </div>
                        <div class='card-content'>
                           <span class='card-title grey-text text-darken-4'>".$namecompany."</span>
                           <span><i class='material-icons activator right' data-idcompany=". $idcompany.">more_vert</i></span>
                        </div>
                        <div class='card-reveal'>
                          <span class='card-title grey-text text-darken-4'>".$namecompany.' VISITAS : '.$visits."<i class='material-icons right'>close</i></span>
                             <p>".$address."</p>
                             <p></p>
                             <p>".$description."</p>
                        </div>
                    </div>
                    </div>
                    </div>";
      }
      ?>

