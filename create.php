<?php
require_once 'clases/ControladorSesion.php';
if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $cs = new ControladorSesion();
    $result = $cs->create($_POST['usuario'], $_POST['nombre'], 
                          $_POST['apellido'], $_POST['clave']);
    if( $result[0] === true ) {
        $redirigir = 'home.php?mensaje='.$result[1];
    }
    else {
        $redirigir = 'create.php?mensaje='.$result[1];
    }
    header('Location: ' . $redirigir);
}
?>
<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Independiente 2021</title>
        <link href="https://fonts.googleapis.com/css2?family=Reggae+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="container">
      <div class="jumbotron text-center">
          <h1>Club atletico Independiente</h1>
          <img src="logoRojo.png">
      </div>    
      <div class="text-center">
        <h3>Crear nuevo usuario en el sistema</h3>
        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

        <form action="create.php" method="post">
            <input name="usuario" class="form-control form-control-lg" placeholder="Usuario"><br>
            <input name="clave" type="password" class="form-control form-control-lg" placeholder="Contraseña"><br>
            <input name="nombre" class="form-control form-control-lg" placeholder="Nombre"><br>
            <input name="apellido" class="form-control form-control-lg" placeholder="Apellido"><br>
            <input type="submit" value="Registrarse" class="btn btn-primary">
        </form>        
      </div> 
    </body>
</html>
