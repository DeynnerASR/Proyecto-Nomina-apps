<?php
    function getAuxTransporte($sueldo){
        if($sueldo<=1160000*2){
            return 140606;
        }else{
            return 0;
        }
    }

    function getPagoIncapacidadEps($conection,$idEmpleado){
        $sql="SELECT dias_incapacidad_eps from devengado WHERE id=$idEmpleado ";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $dias_incapacidad=mysqli_fetch_assoc($res);
        $dias_incapacidad=$dias_incapacidad['dias_incapacidad_eps'];
        $sql="SELECT c.sueldo FROM empleado e INNER JOIN cargo c ON e.id_cargo=c.id_cargo WHERE e.id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $sueldo=mysqli_fetch_assoc($res);
        $sueldo=$sueldo['sueldo'];
        return (int)(($sueldo/30)*0.6666)*$dias_incapacidad;
    }
    function getPagoIncapacidadArl($conection,$idEmpleado){
        $sql="SELECT dias_incapacidad_arl from devengado WHERE id=$idEmpleado ";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $dias_incapacidad=mysqli_fetch_assoc($res);
        $dias_incapacidad=$dias_incapacidad['dias_incapacidad_arl'];
        $sql="SELECT c.sueldo FROM empleado e INNER JOIN cargo c ON e.id_cargo=c.id_cargo WHERE e.id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $sueldo=mysqli_fetch_assoc($res);
        $sueldo=$sueldo['sueldo'];
        return (int)(($sueldo/30))*$dias_incapacidad;
    }

    function getPagoVacaciones($conection,$idEmpleado){
        $sql="SELECT dias_vacaciones FROM devengado WHERE id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $dias_vacaciones=mysqli_fetch_assoc($res);
        $dias_vacaciones=$dias_vacaciones['dias_vacaciones'];
        $sql="SELECT c.sueldo FROM empleado e INNER JOIN cargo c ON e.id_cargo=c.id_cargo WHERE e.id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $sueldo=mysqli_fetch_assoc($res);
        $sueldo=$sueldo['sueldo'];
        return (int)(($sueldo/30))*$dias_vacaciones;
    }

    function getPagoDominical($conection,$idEmpleado){
        $sql="SELECT horas_dominicales FROM devengado WHERE id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $horas_dominicales=mysqli_fetch_assoc($res);
        $horas_dominicales=$horas_dominicales['horas_dominicales'];
        $sql="SELECT c.sueldo FROM empleado e INNER JOIN cargo c ON e.id_cargo=c.id_cargo WHERE e.id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $sueldo=mysqli_fetch_assoc($res);
        $sueldo=$sueldo['sueldo'];
        $horaRegular=(($sueldo/240));
        $horaDominical=($horaRegular*0.75);
        return (int)$horaDominical*$horas_dominicales; 
    }

    function getPagoNocturno($conection,$idEmpleado){
        $sql="SELECT horas_nocturnas FROM devengado WHERE id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $horas_nocturnas=mysqli_fetch_assoc($res);
        $horas_nocturnas=$horas_nocturnas['horas_nocturnas'];
        $sql="SELECT c.sueldo FROM empleado e INNER JOIN cargo c ON e.id_cargo=c.id_cargo WHERE e.id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $sueldo=mysqli_fetch_assoc($res);
        $sueldo=$sueldo['sueldo'];
        $horaRegular=(($sueldo/240));
        $horaNocturna=($horaRegular*0.35);
        return (int)$horaNocturna*$horas_nocturnas; 
    }

    function getPagoAlimentacion($sueldo){
        if($sueldo<2000000){
            return 67824;
        }else{
            return 0;
        }
    }
    
    function getTotalDevengado($conection,$idEmpleado){
        $sql="SELECT SUM(salario_dias_laborados+vacaciones_disfrutadas+auxilio_transporte+pago_incapacidad_eps+pago_incapacidad_arl+recargo_nocturno+recargo_dominical+aux_alimentacion) as total_devengado FROM devengado WHERE id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
        $totalDevengado=mysqli_fetch_assoc($res);
        $totalDevengado=$totalDevengado['total_devengado'];
        return $totalDevengado;
    }
    
    function isertDevengado($salario_dias_laborados,$vacaciones_disfrutadas,$auxilio_transporte,$pago_incapacidad_eps,$pago_incapacidad_arl,$recargo_nocturno,$recargo_dominical,$aux_alimentacion,$conection,$idEmpleado){
        $sql="UPDATE devengado SET salario_dias_laborados=$salario_dias_laborados,vacaciones_disfrutadas=$vacaciones_disfrutadas,auxilio_transporte=$auxilio_transporte,pago_incapacidad_eps=$pago_incapacidad_eps,pago_incapacidad_arl=$pago_incapacidad_arl,recargo_nocturno=$recargo_nocturno,recargo_dominical=$recargo_dominical,aux_alimentacion=$aux_alimentacion WHERE id=$idEmpleado";
        $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
    }
?>