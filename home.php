<?php
require_once 'clases/Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Independiente 2021</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="container" style="background-image: url(textura.png);">
      <div class="jumbotron text-center" style="background: #A90F1B;">
      <h1>Bienvenido al sistema de socios</h1>
      <img src="logoRojo.png" style="height: 150px;">
      </div>    
      <div class="text-center">
        <h3>Hola <?php echo $nomApe;?></h3>
        <p><a href="logout.php">Cerrar sesión</a></p>

      </div> 
      <br>
      
      <div class="text-center">
        <h3>Informe balance 2021</h3>
        <p><a href="informe.php">Ver informe</a></p>
      </div> 
      <br>
      
      <div class="text-center">
        <h3>Registro de cuotas</h3>
        <p><a href="cuotas.php">Ver registro</a></p>
      </div> 
    </body>
</html>

