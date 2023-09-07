<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Nómina</title>
    <link rel="stylesheet" href="./../public/css/base.css">
    <link rel="stylesheet" href="./../public/css/styleNomina.css">
</head>
<body>  
    <header class="title">
        <div>
            <h2 >Registros de Nómina</h2>
        </div>
        
        <div class="desprendible">
                Generar desprendible de nómina 
                <form action="desprendible.php" method="get" target="_blank">
                    <input type="number" name="id" placeholder="Ingrese c.c empleado">
                    <input type="submit" value="Generar">
                </form>
        </div>
        
    </header>
   
    <table border="1">
        <tr>
            <th colspan="6" class="title">Información general</th>
        </tr>
        <tr>
            <th>Nombre del trabajador</th>
            <th>Centro de costos</th>
            <th>Cargo</th>
            <th>No. identificación</th>
            <th>Sueldo</th>
            <th>Días laborados</th>
        </tr>
        <?php 
            include("./../config/database.php");
            include("./../models/empleado.php");
            include("./../models/devengados.php");
            include("./../models/deducciones.php");
            include("./../models/nomina.php");
            $con = connect();
            $sql = "SELECT * FROM empleado";
            $res = mysqli_query($con, $sql) or die("Error en la Consulta $sql: " . mysqli_error($con));
            if(mysqli_num_rows($res)>0){
                while($row = mysqli_fetch_assoc($res)){
                    $idEmpleado=$row['id'];
                    $idCargo=$row['id_cargo'];
                    $puesto=getPuesto($idCargo,$con);
                    $centroCosto=getCentroCosto($idCargo,$con);
                    $sueldo=getSueldo($idCargo,$con);
                    $diasLaborados=getDiasLaborados($idEmpleado,$con);
                    //Formato
                    $sueldo=number_format($sueldo['sueldo'], 0, ',', '.');
                    echo "<tr>
                            <td>".$row['nombre']."</td>
                            <td>".$centroCosto['centro_costo']."</td>
                            <td>".$puesto['puesto']."</td>
                            <td>".$row['id']."</td>
                            <td>$".$sueldo."</td>
                            <td>".$diasLaborados['dias_laborados']."</td>
                          </tr>";
                }
            }
        ?>
    </table>

    <table border="1">
        <tr>
            <th colspan="9" class="title">Devengados</th>
        </tr>
        <tr>
            <th>Salario segun días laborados</th>
            <th>Vacaciones disfrutadas</th>
            <th>Auxilio de transporte</th>
            <th>Pago incapacidad EPS</th>
            <th>Pago incapacidad ARL</th>
            <th>Recargo nocturno</th>
            <th>Recargo dominical</th>
            <th>Auxilio de alimentacion no prestacional</th>
            <th>Total devengado</th>
        </tr>
        <?php
         $sql = "SELECT * FROM empleado";
         $res = mysqli_query($con, $sql) or die("Error en la Consulta $sql: " . mysqli_error($con));
         if(mysqli_num_rows($res)>0){
            while($row = mysqli_fetch_assoc($res)){
                $idEmpleado=$row['id'];
                $idCargo=$row['id_cargo'];

                $diasLaborados=getDiasLaborados($idEmpleado,$con);
                $sueldoDias=getSueldoDias($idEmpleado,$con);
                $auxTrans=getAuxTransporte($sueldoDias);
                $pagoVacaciones=getPagoVacaciones($con,$idEmpleado);
                $pagoIncapacidadEps=getPagoIncapacidadEps($con,$idEmpleado);
                $pagoIncapacidadArl=getPagoIncapacidadArl($con,$idEmpleado);
                $pagoDominical=getPagoDominical($con,$idEmpleado);
                $pagoNocturno=getPagoNocturno($con,$idEmpleado);
                $pagoAlimentacion=getPagoAlimentacion($sueldoDias);
                isertDevengado($sueldoDias,$pagoVacaciones,$auxTrans,$pagoIncapacidadEps,$pagoIncapacidadArl,$pagoNocturno,$pagoDominical,$pagoAlimentacion,$con,$idEmpleado);
                $totalDevengado=getTotalDevengado($con,$idEmpleado);
                insertTotalDevengado($con,$totalDevengado,$idEmpleado);
                //Formato
                
                $sueldoDias=number_format($sueldoDias, 0, ',', '.');
                $auxTrans=number_format($auxTrans, 0, ',', '.');
                $pagoVacaciones=number_format($pagoVacaciones, 0, ',', '.');
                $pagoIncapacidadEps=number_format($pagoIncapacidadEps, 0, ',', '.');
                $pagoIncapacidadArl=number_format($pagoIncapacidadArl, 0, ',', '.');
                $pagoDominical=number_format($pagoDominical, 0, ',', '.');
                $pagoNocturno=number_format($pagoNocturno, 0, ',', '.');
                $pagoAlimentacion=number_format($pagoAlimentacion, 0, ',', '.');
                $totalDevengado=number_format($totalDevengado, 0, ',', '.');
                echo "<tr>
                        <td>$".$sueldoDias."</td>
                        <td>$".$pagoVacaciones."</td>
                        <td>$".$auxTrans."</td>
                        <td>$".$pagoIncapacidadEps."</td>
                        <td>$".$pagoIncapacidadArl."</td>
                        <td>$".$pagoNocturno."</td>
                        <td>$".$pagoDominical."</td>
                        <td>$".$pagoAlimentacion."</td>
                        <td>$".$totalDevengado."</td>
                      </tr>";
            }
        }
        ?>
        </table>    
    <table border="1">
        <tr>
            <th colspan="12" class="title">Deducciones</th>    
        </tr>
        <tr>
            <th colspan="3">Deducciones nominales</th>
            <th colspan="9">Deducciones por prestamo</th>
        </tr>
        <tr>
            <th>Salud</th>
            <th>Pension</th>
            <th>Fondo de Solidaridad Pensional</th>
            <th>Monto del Desembolso</th>
            <th>No. De Cuotas a  Descontar</th>
            <th>Fecha del Desembolso</th>
            <th>No. De Cuota Pagada</th>
            <th>Cuotas por Descontar</th>
            <th>Nomina en que termina Prestamo</th>
            <th>Valor Cuota </th>
            <th>Saldo del Prestamo</th>
            <th>Total deducciones</th>
        </tr>   
        <?php
            $sqlDeducciones = "SELECT id FROM empleado"; ;
            $resDeducciones = mysqli_query($con, $sqlDeducciones) or die("Error en la Consulta $sql: " . mysqli_error($con));
            if(mysqli_num_rows($res)>0){
                while($row = mysqli_fetch_array($resDeducciones)){
                    $idEmpleado=$row['id'];
                    $salud_pension=getSaludPesion($con,$idEmpleado);
                    $fondoSolidaridad=getFondoSolidaridad($con,$idEmpleado);
                    $desembolo=getMontoDesembolso($con,$idEmpleado);
                    $cuotasDescontar= getCuotasDescontar($con,$idEmpleado);
                    $fechaDesembolso = getFechaDesembolso($con,$idEmpleado);
                    $cuotaPagada= getCuotaPagada($con,$idEmpleado);
                    $cuotasPorDescontar = getCuotaPorDescontar($con,$idEmpleado);
                    $nominaTerminaPrestamo = getTerminaPrestamo($con,$idEmpleado);
                    $valorCuota = getValorCuota($con,$idEmpleado);
                    $saldoPrestamo= getSaldoPrestamo($con,$idEmpleado);
                    insertDeducciones($salud_pension,$salud_pension,$fondoSolidaridad,$saldoPrestamo,$cuotasPorDescontar,$con,$idEmpleado);
                    $totalDeducciones = getTotalDeducciones($con,$idEmpleado);
                    insertTotalDeducciones($con,$totalDeducciones,$idEmpleado);
                    insertTotalNomina($con,$idEmpleado);

                    #Formato 
                    $salud_pension=number_format($salud_pension, 0, ',', '.');
                    $fondoSolidaridad=number_format($fondoSolidaridad, 0, ',', '.');
                    $desembolo=number_format($desembolo, 0, ',', '.');
                    $valorCuota=number_format($valorCuota, 0, ',', '.');
                    $saldoPrestamo=number_format($saldoPrestamo, 0, ',', '.');
                    $totalDeducciones=number_format($totalDeducciones, 0, ',', '.');
                    echo"
                        <tr>
                            <td>$".$salud_pension."</td>
                            <td>$".$salud_pension."</td>
                            <td>$".$fondoSolidaridad."</td>
                            <td>$".$desembolo."</td>
                            <td>".$cuotasDescontar."</td>
                            <td>".$fechaDesembolso."</td>
                            <td>".$cuotaPagada."</td>
                            <td>".$cuotasPorDescontar."</td>
                            <td>".$nominaTerminaPrestamo."</td>
                            <td>$".$valorCuota."</td>
                            <td>$".$saldoPrestamo."</td>
                            <td>$".$totalDeducciones."</td>
                        </tr>";
                }
            }
        ?>
    </table>
    <table border="1">
        <tr>
            <th colspan="3" class="title">Nomina a pagar</th>
        </tr>
        <tr>
            <th>Nombre</th>
            <th>Identificación</th>
            <th>Total nomina</th>
        </tr>
        <?php
            $sqlNomina = "SELECT nombre,id FROM empleado";
            $resNomina = mysqli_query($con, $sqlNomina) or die("Error en la Consulta $sql: " . mysqli_error($con));
            if(mysqli_num_rows($resNomina)>0){
                while($row = mysqli_fetch_array($resNomina)){
                    $idEmpleado=$row['id'];
                    $totalNomina=getTotalNomina($con,$idEmpleado);
                    insertTotalNomina($con,$idEmpleado);
                    $totalNomina=number_format($totalNomina, 0, ',', '.');
                    echo"
                        <tr>
                            <td>".$row['nombre']."</td>
                            <td>".$row['id']."</td>
                            <td>$".$totalNomina."</td>
                        </tr>";
                }
            }
        ?>
    </table>
</body>
</html>