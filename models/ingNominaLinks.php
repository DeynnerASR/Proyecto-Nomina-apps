<?php 
    include("./../config/database.php");
    include("./../models/empleado.php");
    include("./../models/devengados.php");
    include("./../models/deducciones.php");
    include("./../models/nomina.php");
    $con = connect();
    $idEmpleado = $_POST['userId'];
    if (isset($_POST['agregarNomina'])) {   
        $d_laborados = $_POST['diasLaborados'];
        $d_vacaciones = $_POST['diasVacaciones'];
        $d_eps = $_POST['diasIncapacidad_eps'];
        $d_arl = $_POST['diasIncapacidad_arl'];
        $h_nocturnas = $_POST['horasNocturnas'];
        $h_dominicales = $_POST['horasDominicales'];
        $salarioDiasLaborados = $_POST['salarioDiasLaborados'];
        $salarioVacaciones = $_POST['salarioVacaciones'];
        $salarioAuxilioTransporte = $_POST['salarioAuxilioTransporte'];
        $salarioPagoIncapacidadEPS = $_POST['salarioPagoIncapacidadEPS'];
        $salarioPagoIncapacidadARL = $_POST['salarioPagoIncapacidadARL'];
        $recargoNocturno = $_POST['recargoNocturno'];
        $recargoDominical = $_POST['recargoDominical'];
        $auxilioAlimentacion = $_POST['auxilioAlimentacion'];
        $consulta ="INSERT INTO devengado (
                                        dias_laborados,
                                        salario_dias_laborados,
                                        dias_vacaciones,
                                        vacaciones_disfrutadas,
                                        auxilio_transporte,
                                        dias_incapacidad_eps,
                                        dias_incapacidad_arl,
                                        pago_incapacidad_eps,
                                        pago_incapacidad_arl,
                                        horas_nocturnas,
                                        horas_dominicales,
                                        recargo_nocturno,
                                        recargo_dominical,
                                        aux_alimentacion,
                                        id
                                        ) VALUES
                                            ('$d_laborados', '$salarioDiasLaborados','$d_vacaciones', '$salarioVacaciones','$d_eps', '$d_arl', 
                                            '$salarioPagoIncapacidadEPS', '$salarioPagoIncapacidadARL', '$h_nocturnas', '$h_dominicales', 
                                            '$recargoNocturno', '$recargoDominical', '$auxilioAlimentacion', '$idEmpleado')";
        $result1 = mysqli_query($con, $consulta);
        if($result1){
            $salud = $_POST['salud'];
            $pension = $_POST['pension'];
            $fondoSolidaridadPensional = $_POST['fondoSolidaridadPensional'];
            $desembolso = $_POST['desembolso'];
            $cuotasDescontar = $_POST['cuotasDescontar'];
            $fechaDesembolso = $_POST['fechaDesembolso'];
            $cuotaPagada = $_POST['cuotaPagada'];
            $cuotaPorDescontar = $_POST['cuotaPorDescontar'];
            $terminaPrestamo = $_POST['terminaPrestamo'];
            $valorCuota = $_POST['valorCuota'];
            $saldoPrestamo = $_POST['saldoPrestamo'];
            $consulta ="INSERT INTO deducciones (
                                                salud,
                                                pension,
                                                fondo_solidaridad_pensional,
                                                desembolso,
                                                cuotas_a_descontar,
                                                fecha_desembolso,
                                                cuota_pagada,
                                                cuota_por_descontar,
                                                termina_prestamo,
                                                valor_cuota,
                                                saldo_prestamo,
                                                id
                                            ) VALUES
                                                ('$salud', '$pension', '$fondoSolidaridadPensional', '$desembolso', '$cuotasDescontar', '$fechaDesembolso', '$cuotaPagada', 
                                                '$cuotaPorDescontar', '$terminaPrestamo', '$valorCuota', '$saldoPrestamo', '$idEmpleado')";
            $result2 = mysqli_query($con, $consulta);
            if($result2){
                $totalDevengado = $_POST['totalDevengado'];
                $totalDeducciones = $_POST['totalDeducciones'];
                $totalNomina = $_POST['totalNomina'];
                $consulta ="INSERT INTO nomina (
                                                    total_devengado,
                                                    total_deducciones,
                                                    total_nomina,
                                                    id_empleado
                                                ) VALUES
                                                    ('$totalDevengado', '$totalDeducciones', '$totalNomina', '$idEmpleado')";
                $result3 = mysqli_query($con, $consulta);
                if($result3){
                    echo '<script>
                        alert("Se agrego correctamente la nomina del empleado")
                        location.assign("./../index.php");
                        </script>';
                }else{
                    echo '<script>
                        alert("FATAL ERROR: No se agrego correctamente la nomina del empleado")
                        location.assign("./../index.php");
                        </script>';
                }
            }else{
                echo '<script>
                    alert("FATAL ERROR: No se agrego correctamente las deducciones")
                    location.assign("./../index.php");
                    </script>';
            }
        }else{
            echo '<script>
                alert("FATAL ERROR: No se agrego correctamente los devengados")
                location.assign("./../index.php");
                </script>';
        }
      exit();
    }

    if (isset($_POST['regresarIndex'])) {
      header('Location: ./../index.php');
    exit();
    }
    

    ?>