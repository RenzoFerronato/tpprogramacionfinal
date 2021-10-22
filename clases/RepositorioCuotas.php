<?php
require_once '.env.php';
require_once 'Usuario.php';
require_once 'Repositorio.php';

class RepositorioCuotas extends Repositorio
{

    public function cuotas($id)
    {
        $q = "SELECT precioCuota, fechaCuota, abonoCuota, idcuotas FROM cuotas WHERE idUsuario = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("i", $id); // $nombre_usuario luego reemplazar por $id. 

        $query->execute();
        $resultado = $query->get_result();
        $arrayCuotas = [];
        while ($fila = $resultado->fetch_array(MYSQLI_NUM))
        {
            $arrayCuotas[] = $fila;
        }

        return $arrayCuotas;
    }

    public function pagarCuota($idCuota)
    {
        $q = "UPDATE `cuotas` SET `abonoCuota` = '1' WHERE (`idcuotas` = ?)";
        $query = self::$conexion->prepare($q);
        $query->bind_param("i", $idCuota);

        return $query->execute();
    }

    public function eliminarCuota($idCuota)
    {
        $q = "DELETE FROM `cuotas` WHERE (`idcuotas` = ?)";
        $query = self::$conexion->prepare($q);
        $query->bind_param("i", $idCuota);

        return $query->execute();
    }
}