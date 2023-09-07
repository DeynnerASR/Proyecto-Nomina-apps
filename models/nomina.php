<?php
    function insertTotalDevengado($conection,$totalDevengado,$idEmpleado){
        $sql="UPDATE nomina SET total_devengado=$totalDevengado WHERE id_empleado=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
    }

    function insertTotalDeducciones($conection,$totalDeducciones,$idEmpleado){
        $sql="UPDATE nomina SET total_deducciones=$totalDeducciones WHERE id_empleado=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
    }

    function insertTotalNomina($conection,$idEmpleado){
        $sql="SELECT total_devengado-total_deducciones AS total_nomina FROM nomina WHERE id_empleado=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $totalNomina=mysqli_fetch_assoc($res);
        $totalNomina=$totalNomina['total_nomina'];
        $sql="UPDATE nomina SET total_nomina=$totalNomina WHERE id_empleado=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
    }

    function getTotalNomina($conection,$idEmpleado){
        $sql="SELECT total_nomina FROM nomina WHERE id_empleado=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $totalNomina=mysqli_fetch_assoc($res);
        $totalNomina=$totalNomina['total_nomina'];
        return $totalNomina;
    }
?>