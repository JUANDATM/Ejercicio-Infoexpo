<?php
      include_once("../Utilerias/BaseDatos.php");
      $post = $_POST;
      $accion = $post["accion"];
      $tabla = $post["tabla"];
      $funcion = $accion.$tabla;
      $result = $funcion($post);
      if ($result){
            $response['status']=1; 
            $response['data']=$post; 
      }
      else{
            $response['status']=0;
            $response['data']=$post;
      }
      echo json_encode($response); 
?>