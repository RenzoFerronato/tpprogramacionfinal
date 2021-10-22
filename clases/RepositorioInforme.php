<?php
require_once '.env.php';
require_once 'Repositorio.php';

class RepositorioInforme extends Repositorio
{

    public function getMaxValue()
    {
        $q = "SELECT MAX(precioCuota) as max_items FROM cuotas;";
        $query = self::$conexion->prepare($q);
        $query->execute();
        $resultado = $query->get_result();

        return 'La cuota de mayor valor es de un total de '. $resultado->fetch_array()[0];
    }

    public function getMinValue()
    {
        $q = "SELECT MIN(precioCuota) as max_items FROM cuotas;";
        $query = self::$conexion->prepare($q);
        $query->execute();
        $resultado = $query->get_result();

        return 'La cuota de menor valor cuesta un total de '. $resultado->fetch_array()[0];
    }

    public function cuotasPagadas()
    {
        $q = "SELECT * FROM `cuotas` WHERE `abonoCuota` = TRUE";
        $query = self::$conexion->prepare($q);
        $query->execute();
        $resultado = $query->get_result();

        $cuotas = [];
        while ($fila = $resultado->fetch_array(MYSQLI_NUM))
        {
            $cuotas[] = $fila;
        }

        return $cuotas;
    }

    public function cuotasDebidas()
    {
        $q = "SELECT * FROM `cuotas` WHERE `abonoCuota` = FALSE";
        $query = self::$conexion->prepare($q);
        $query->execute();
        $resultado = $query->get_result();

        $cuotas = [];
        while ($fila = $resultado->fetch_array(MYSQLI_NUM))
        {
            $cuotas[] = $fila;
        }

        return $cuotas;
    }
}