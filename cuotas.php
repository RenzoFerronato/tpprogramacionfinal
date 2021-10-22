<?php
  require_once 'clases/Usuario.php';
  require_once 'clases/RepositorioCuotas.php';
  session_start();
  if (isset($_SESSION['usuario'])) {
      $usuario = unserialize($_SESSION['usuario']);
      $userId = $usuario->getId();
  } else {
      header('Location: index.php');
  }
?>

<?php 
  $c = new RepositorioCuotas();
  $cuotas = $c->cuotas($userId);  
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
        <h1>Registro de cuotas</h1>
        <img src="logoRojo.png" style="height: 130px;">
      </div>    

      <table class="table table-striped">
        <tr>
            <th>Fecha</th><th>Precio</th><th>Abonada</th><th>Pagar cuota<th>Eliminar</th>
        </tr>
        <?php
          if (count($cuotas) == 0) {
              echo "<tr><td colspan='5'>No tiene cuotas asignadas</td></tr>";
          } else {
              foreach ($cuotas as $unaCuota) {
                  $abonado = ($unaCuota[2] == 0) ? 'Debe' : 'Pagada'; 
                  echo '<tr id="cuota-'.$unaCuota[3].'">';
                  echo "<td>".$unaCuota[1]."</td>";
                  echo "<td>".$unaCuota[0]."</td>";
                  echo '<td class="status-'.$unaCuota[3].'">'.$abonado.'</td>';
                  echo ($unaCuota[2] == 0) ? '<td><button onClick="pagarcuota(this,'.$unaCuota[3].');">Pagar</button></td>' : '<td></td>';
                  echo '<td><button onClick="eliminarCuota('.$unaCuota[3].');">Eliminar</button></td>';
                  echo '</tr>';
              }
          }
        ?>
        </table>

      <br> 
      <div class="text-center">
        <p><a href="home.php">Volver al inicio</a style="color: red;"></p>
      </div> 

      <script type="text/javascript">
        function pagarcuota($elem, $idCuota) {
            var cadena = "id="+$idCuota;
            var btn = $elem;
            var solicitud = new XMLHttpRequest();

            solicitud.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var respuesta = JSON.parse(this.responseText);

                    if(respuesta.resultado == "OK") {
                        btn.style.display = 'none';
                        var identificador = ".status-" + respuesta.idcuota;
                        var celda = document.querySelector(identificador);
                        celda.innerHTML = "Pagada";
                    } else {
                        alert(respuesta.resultado);
                    }
                }
            };
            solicitud.open("POST", "pagarCuota.php", true);
            solicitud.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            solicitud.send(cadena);
        }

        function eliminarCuota($idCuota) {
          var cadenaDelete = "id="+$idCuota;
          var solicitudDelete = new XMLHttpRequest();

          solicitudDelete.onreadystatechange = function() {
            console.log('test1');
              if (this.readyState == 4 && this.status == 200) {
                  var respuesta = JSON.parse(this.responseText);

                  if(respuesta.resultado == "OK") {
                      var identificador = "#cuota-" + respuesta.idcuota;
                      var fila = document.querySelector(identificador);
                      fila.style.display = 'none';
                  } else {
                      alert(respuesta.resultado);
                  }
              }
          };
          solicitudDelete.open("POST", "eliminarCuota.php", true);
          solicitudDelete.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          solicitudDelete.send(cadenaDelete);
        }
      </script>
    </body>
</html>