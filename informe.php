<?php
  require_once 'clases/Usuario.php';
  require_once 'clases/RepositorioInforme.php';
  session_start();
  if (isset($_SESSION['usuario'])) {
      $usuario = unserialize($_SESSION['usuario']);
      $userId = $usuario->getId();
  } else {
      header('Location: index.php');
  }
?>

<?php $i = new RepositorioInforme(); ?>



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
      <h1>Tu informe como socio:</h1>
      <img src="logoRojo.png" style="height: 150px;">
      </div>    
      <br>
      
      <div style="border: 1px solid black;"class="text-center">
        <div style="margin: 20px;" class="contenedor">
		    <h3><?php echo $i->getMaxValue(); ?></h3>
			<br>
			<h3><?php echo $i->getMinValue(); ?></h3>
			<br>

			<?php $cuotas = $i->cuotasPagadas(); ?>
				<h4>Cantidad de cuotas pagadas: <?php echo count($cuotas); ?></h4>
				(<?php 
				foreach ($cuotas as $unaCuota) {
					echo ' ' . $unaCuota[3] . ' ';
				}
			?>)

			<br><br>

			<?php $cuotasSinpagar = $i->cuotasDebidas(); ?>
				<h4>Cantidad de cuotas sin pagar: <?php echo count($cuotasSinpagar); ?></h4>
				(<?php 
				foreach ($cuotasSinpagar as $unaCuota) {
					echo ' ' . $unaCuota[3] . ' ';
				}
			?>)
        </div>
      </div> 
      <br>

      <div class="text-center">
        <p><a href="home.php">Volver al inicio</a style="color: red;"></p>
      </div> 
      
    </body>
</html>