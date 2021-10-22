<?php 
  require_once 'clases/RepositorioCuotas.php';

  $rc = new RepositorioCuotas();
  
  if ($rc->eliminarCuota($_POST['id'])) {
     $respuesta['resultado'] = "OK";
     $respuesta['idcuota'] = $_POST['id'];
  }else{
     $respuesta['resultado'] = "Error al realizar la operación";
  }

  echo json_encode($respuesta);
  
?>