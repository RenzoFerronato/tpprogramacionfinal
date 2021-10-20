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
      <h1>Club Atletico Independiente</h1>
      <img src="logoRojo.png">
      </div>    
      <div class="text-center">
        <h2>¡Bienvenido socio del rey de copas!</h2>
        <h3>Login de usuario</h3>
        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

        <form action="login.php" method="post">
            <input name="usuario" class="form-control form-control-lg" placeholder="Usuario"><br>
            <input name="clave" type="text" class="form-control form-control-lg" placeholder="Contraseña"><br>
            <input type="submit" value="Ingresar" class="btn btn-primary">
        </form><br>
        <p><a href="create.php">Crear nuevo usuario</a></p>
      </div> 
    </body>
</html>
