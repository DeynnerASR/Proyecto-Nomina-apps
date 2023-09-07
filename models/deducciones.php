<?php
    function getSaludPesion($conection,$idEmpleado){
        $sql="SELECT c.sueldo FROM empleado e INNER JOIN cargo c ON e.id_cargo=c.id_cargo WHERE e.id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $sueldo=mysqli_fetch_assoc($res);
        $sueldo=$sueldo['sueldo'];
        return (int)($sueldo*0.04);
    }
    function getFondoSolidaridad($con,$idEmpleado) {
        $sql="SELECT c.sueldo FROM empleado e INNER JOIN cargo c ON e.id_cargo=c.id_cargo WHERE e.id=$idEmpleado";
        $res=mysqli_query($con,$sql) or die("Error en la consulta $sql".mysqli_error($con));
        $sueldo=mysqli_fetch_assoc($res);
        $sueldo=$sueldo['sueldo'];
        if($sueldo>3124968){
            return (int)($sueldo*0.01);
        }else{
            return 0;   
        }
    }
    function getMontoDesembolso($conection,$idEmpleado){
        $sql="SELECT desembolso FROM deducciones WHERE id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $monto_desembolso=mysqli_fetch_assoc($res);
        $monto_desembolso=$monto_desembolso['desembolso'];
        return $monto_desembolso;
    }
    function getCuotasDescontar($con,$idEmpleado){
        $sql="SELECT cuotas_a_descontar FROM deducciones WHERE id=$idEmpleado";
        $res=mysqli_query($con,$sql) or die("Error en la consulta $sql".mysqli_error($con));
        $cuotas=mysqli_fetch_assoc($res);
        $cuotas=$cuotas['cuotas_a_descontar'];
        return $cuotas;
    }
    function getFechaDesembolso($con,$idEmpleado){
        $sql="SELECT fecha_desembolso FROM deducciones WHERE id=$idEmpleado";
        $res=mysqli_query($con,$sql) or die("Error en la consulta $sql".mysqli_error($con));
        $fecha=mysqli_fetch_assoc($res);
        $fecha=$fecha['fecha_desembolso'];
        return $fecha;
    }
   
    function getCuotaPagada($con,$idEmpleado){
        $sql="SELECT cuota_pagada FROM deducciones WHERE id=$idEmpleado";
        $res=mysqli_query($con,$sql) or die("Error en la consulta $sql".mysqli_error($con));
        $cuota=mysqli_fetch_assoc($res);
        $cuota=$cuota['cuota_pagada'];
        return $cuota;
    }

    function getCuotaPorDescontar($con,$idEmpleado){ 
        $sql="SELECT cuotas_a_descontar, cuota_pagada FROM deducciones WHERE id=$idEmpleado";
        $res=mysqli_query($con,$sql) or die("Error en la consulta $sql".mysqli_error($con));
        $cuotas=mysqli_fetch_assoc($res);
        $cuota_descontar=$cuotas['cuotas_a_descontar'];
        $cuota_pagada=$cuotas['cuota_pagada'];
        return $cuota_descontar-$cuota_pagada;
    }
    function getTerminaPrestamo($con,$idEmpleado){
        $sql="SELECT termina_prestamo FROM deducciones WHERE id=$idEmpleado";
        $res=mysqli_query($con,$sql) or die("Error en la consulta $sql".mysqli_error($con));
        $terminaPrestamo=mysqli_fetch_assoc($res);
        $terminaPrestamo=$terminaPrestamo['termina_prestamo'];
        return $terminaPrestamo;
    }
    function  getValorCuota($con,$idEmpleado){
        $sql="SELECT valor_cuota FROM deducciones WHERE id=$idEmpleado";
        $res=mysqli_query($con,$sql) or die("Error en la consulta $sql".mysqli_error($con));
        $valorCuota=mysqli_fetch_assoc($res);
        $valorCuota=$valorCuota['valor_cuota'];
        return $valorCuota;
    }
    function getSaldoPrestamo($con,$idEmpleado){
        $sql="SELECT cuota_por_descontar,valor_cuota FROM deducciones WHERE id=$idEmpleado";
        $res=mysqli_query($con,$sql) or die("Error en la consulta $sql".mysqli_error($con));
        $datos=mysqli_fetch_assoc($res);
        $cuota=$datos['cuota_por_descontar'];
        $valor_cuota=$datos['valor_cuota'];
        return ($cuota*$valor_cuota);
    }
    function insertDeducciones($salud,$pension,$fondo,$saldo,$cuota,$conection,$idEmpleado){
        $sql="UPDATE deducciones SET  salud=$salud,pension=$pension,fondo_solidaridad_pensional=$fondo,saldo_prestamo=$saldo,cuota_por_descontar=$cuota WHERE id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
    }
    function getTotalDeducciones($conection,$idEmpleado){
        $sql="SELECT SUM(salud+pension+fondo_solidaridad_pensional+(cuota_pagada*valor_cuota)) as total_deducciones FROM deducciones WHERE id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $totalDeducciones=mysqli_fetch_assoc($res);
        $totalDeducciones=$totalDeducciones['total_deducciones'];
        return $totalDeducciones;
    }
?>