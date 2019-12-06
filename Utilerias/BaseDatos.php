<?php
try{
        $Cn = new PDO('mysql:host=localhost; dbname=visitcompany','root',''); 
        $Cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $Cn->exec("SET CHARACTER SET utf8");                     
}catch(Exception $e){
    die("Error: " . $e->GetMessage());
}
// Función para ejecutar consultas SELECT
function Consulta($query)
{
    global $Cn;
 
    try{    
        $result =$Cn->query($query);
        $resultado = $result->fetchAll(PDO::FETCH_ASSOC); 
        $result->closeCursor();
        return $resultado;
    }catch(Exception $e){
        die("Error en la LIN: " . $e->getLine() . ", MSG: " . $e->GetMessage());
    }
}

// Función que recibe un insert y regresa el consecutivo que le genero en la llave primaria
// por ejemplo: Insert Into cuerpo.clasif (nomclasif) values ('Articulo en Extenso') 
// Returning idclasif, nomclasif;
function EjecutaConsecutivo($sentencia, $llave){
    global $Cn;
    try {
        $result = $Cn->query($sentencia);
        $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
        $result->closeCursor();

        return $resultado[0][$llave];
    } catch (Exception $e) {
        die("Error en la linea: " + $e->getLine() + " MSG: " + $e->GetMessage());
        return 0;
    }
}
// Sirve para ejecutar una sentencia INSERT, UPDATE O DELETE
function Ejecuta ($sentencia){
    global $Cn;
    try {
        $result = $Cn->query($sentencia);
        $result->closeCursor();
        return 1; // Exito  
    } catch (Exception $e) {
        //die("Error en la linea: " + $e->getLine() + " MSG: " + $e->GetMessage());
        return 0; // Fallo
    }
}
//---------------------------------------------------------------------------------------------------------------------------//
function consultaEmpresa(){
    $query = "SELECT idcompany,namecompany,address,visits,description FROM visitcompany.company ORDER BY namecompany";
    return Consulta($query); 
}
function Eliminarcompany($post){
    $idcompany = $post['idcompany'];
    $sentencia = "DELETE FROM visitcompany.company WHERE idcompany=$idcompany";
    return Ejecuta($sentencia);
}
function Insertarcompany($post){
    $namecompany = $post['namecompany'];
    $address = $post['address'];
    $description = $post['description'];
   $sentencia = "CALL id_company('$namecompany','$address','$description','0')";
    return EjecutaConsecutivo($sentencia,'idcompanyr');
    $post['idcompany']= $id;
    return $id;
}
function Actualizarcompany($post){
    $idcompany = $post['idcompany'];
    $namecompany = $post['namecompany'];
    $address = $post['address'];
    $description = $post['description'];
    $sentencia = "UPDATE visitcompany.company SET namecompany='$namecompany',address='$address',description='$description' WHERE idcompany=$idcompany";
    return Ejecuta($sentencia);
}

//-----------------------------------USUARIOS--------------------------------------------------------------------------------------------------
function consultaUsuario(){
    $query = "SELECT iduser,emailuser,passworduser,idtypeuserf,nametypeuser
     FROM type_user INNER JOIN visitcompany.users ON (users.idtypeuserf=type_user.idtypeuser)
     ORDER BY iduser";
    return Consulta($query); 
}
function Eliminaruser($post){
    $iduser = $post['iduser'];
    $sentencia = "DELETE FROM visitcompany.users WHERE iduser=$iduser";
    return Ejecuta($sentencia);
}
function Insertaruser($post){
    $emailuser = $post['emailuser'];
    $passworduser = $post['passworduser'];
    $idtypeuserf = $post['idtypeuserf'];
    $sentencia = "CALL getiduser('$emailuser','$passworduser','$idtypeuserf')";
    return EjecutaConsecutivo($sentencia,'lastiduser');
    $post['iduser']= $id;
    return $id;
}
function Actualizaruser($post){
    $iduser = $post['iduser'];
    $emailuser = $post['emailuser'];
    $passworduser = $post['passworduser'];
    $sentencia = "UPDATE visitcompany.users SET emailuser='$emailuser',passworduser='$passworduser' WHERE iduser=$iduser";
    return Ejecuta($sentencia);
}
//------------------------------------------LLENA TIPO USUARIOS------------------------------------------------------------------------
function consultaTypeuser(){
    $query = "SELECT idtypeuser,nametypeuser FROM visitcompany.type_user ORDER BY idtypeuser";
    return Consulta($query); 
}
//----------------------------------------LLENA CARDS---------------------------------------------------------------------------
function ConsultaEmpressa(){
    $query = "SELECT idcompany,namecompany,description,address,visits FROM visitcompany.company ORDER BY idcompany";
    return Consulta($query); 
}

function Visitscompany($post){
    $idcompany = $post['idcompany'];
    $sentencia = "UPDATE visitcompany.company SET visits= visits+1 WHERE idcompany=$idcompany";
    return Ejecuta($sentencia);
}