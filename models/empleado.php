<?php
  function getPuesto($id,$conection){
    $sql="SELECT puesto FROM cargo WHERE id_cargo=$id";
    $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
    $puesto=mysqli_fetch_assoc($res);
    return $puesto;
  }
  function getCentroCosto($id,$conection){
    $sql="SELECT centro_costo FROM cargo WHERE id_cargo=$id";
    $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
    $centro_costo=mysqli_fetch_assoc($res);
    return $centro_costo;
  }
  function getSueldo($id,$conection){
    $sql="SELECT sueldo FROM cargo WHERE id_cargo=$id";
    $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
    $sueldo=mysqli_fetch_assoc($res);
    return $sueldo;
  }

  function getDiasLaborados($id,$conection){
    $sql="SELECT dias_laborados FROM devengado WHERE id=$id";
    $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
    $dias_laborados=mysqli_fetch_assoc($res);
    return $dias_laborados;
  }

  function getSueldoDias($idEmpleado,$conection){
    $sql="SELECT c.sueldo FROM empleado e INNER JOIN cargo c ON e.id_cargo=c.id_cargo WHERE e.id=$idEmpleado";
    $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
    $sueldo=mysqli_fetch_assoc($res);
    $sql="SELECT dias_laborados FROM devengado WHERE id=$idEmpleado";
    $res=mysqli_query($conection,$sql) or die("Error en la consulta $sql".mysqli_error($conection));
    $dias_laborados=mysqli_fetch_assoc($res);
    return (int)($sueldo['sueldo']*$dias_laborados['dias_laborados']/30);
  }
?>