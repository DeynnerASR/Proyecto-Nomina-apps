<?php 
    include("./../config/database.php");
    include("./../models/empleado.php");
    include("./../models/devengados.php");
    include("./../models/deducciones.php");
    include("./../models/nomina.php");
    $con = connect();
    $idEmpleado = $_POST['userId'];

    if (isset($_POST['calcularDevengado'])) {   
        $d_laborados = $_POST['diasLaborados'];
        $d_vacaciones = $_POST['diasVacaciones'];
        $d_eps = $_POST['diasIncapacidad_eps'];
        $d_arl = $_POST['diasIncapacidad_arl'];
        $h_nocturnas = $_POST['horasNocturnas'];
        $h_dominicales = $_POST['horasDominicales'];
        $consulta ="INSERT INTO devengado (
                                            dias_laborados,
                                            dias_vacaciones,
                                            dias_incapacidad_eps,
                                            dias_incapacidad_arl,
                                            horas_nocturnas,
                                            horas_dominicales,
                                            id
                                        ) VALUES
                                            ('$d_laborados','$d_vacaciones','$d_eps', '$d_arl', '$h_nocturnas', '$h_dominicales', '$idEmpleado')";
        $result = mysqli_query($con, $consulta);
        if($result){
                $sueldoDias=getSueldoDias($idEmpleado,$con);
                $auxTrans=getAuxTransporte($sueldoDias);
                $pagoVacaciones=getPagoVacaciones($con,$idEmpleado);
                $pagoIncapacidadEps=getPagoIncapacidadEps($con,$idEmpleado);
                $pagoIncapacidadArl=getPagoIncapacidadArl($con,$idEmpleado);
                $pagoDominical=getPagoDominical($con,$idEmpleado);
                $pagoNocturno=getPagoNocturno($con,$idEmpleado);
                $pagoAlimentacion=getPagoAlimentacion($sueldoDias);
            ?>
                <script>
                    const sueldoDias = <?php echo $sueldoDias; ?>;
                    const txtSalario = document.getElementById('salarioDiasLaborados');
                    const pagoVacaciones = <?php echo $pagoVacaciones; ?>;
                    const txtVacaciones = document.getElementById('salarioVacaciones');
                    const auxTrans = <?php echo $auxTrans; ?>;
                    const txtAuxTr = document.getElementById('salarioAuxilioTransporte');
                    const pagoIncapacidadEps = <?php echo $pagoIncapacidadEps; ?>;
                    const txtPagoEPS = document.getElementById('salarioPagoIncapacidadEPS');
                    const pagoIncapacidadArl = <?php echo $pagoIncapacidadArl; ?>;
                    const txtPagoARL = document.getElementById('salarioPagoIncapacidadARL');
                    const pagoNocturno = <?php echo $pagoNocturno; ?>;
                    const txtReNocturno = document.getElementById('recargoNocturno');
                    const pagoDominical = <?php echo $pagoDominical; ?>;
                    const txtReDominical = document.getElementById('recargoDominical');
                    const pagoAlimentacion = <?php echo $pagoAlimentacion; ?>;
                    const txtAuxAli = document.getElementById('auxilioAlimentacion');

                    txtSalario.textContent = sueldoDias;
                    txtVacaciones.textContent = pagoVacaciones;
                    txtAuxTr.textContent = auxTrans;
                    txtPagoEPS.textContent = pagoIncapacidadEps;
                    txtPagoARL.textContent = pagoIncapacidadArl;
                    txtReNocturno.textContent = pagoNocturno;
                    txtReDominical.textContent = pagoDominical;
                    txtAuxAli.textContent = pagoAlimentacion;
                
                </script>
            <?php
            isertDevengado($sueldoDias,$pagoVacaciones,$auxTrans,$pagoIncapacidadEps,$pagoIncapacidadArl,$pagoNocturno,$pagoDominical,$pagoAlimentacion,$con,$idEmpleado);
            echo '<script>
                alert("Se agrego correctamente los devengados")
                location.assign("./../views/ingresarNomina.php?id='.$idEmpleado.'");
                </script>';
        }else{
            '<script>
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