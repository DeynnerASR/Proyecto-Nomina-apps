<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Devengados | Deducciones</title>
    <link rel="stylesheet" href="./../public/css/styleAgNomina.css">
</head>
<body>
    <header>
        <h1>Ingresar Devengados | Deducciones</h1>
    </header>
    <?php 
    include("./../config/database.php");
    $con = connect();
    $id = $_GET['id'];

    $consulta = "SELECT e.id, e.nombre, e.telefono, c.puesto, c.sueldo
                    FROM empleado e NATURAL JOIN cargo c
                    WHERE id = '$id'";
    $result1 = mysqli_query($con, $consulta);
    if($result1){
        while($row = $result1->fetch_array()){
            $nombre = $row['nombre'];
            $telefono = $row['telefono'];
            $cargo = $row['puesto'];
            $salario = $row['sueldo'];
        }
    }
    
    ?>
    
    <div class="container">
        <div class="user-info">
            <label for="userId">ID:</label>
            <input type="text" id="userId" name="userId" class="form-input" placeholder="ID" value=<?php echo $id; ?> readonly>

            <label for="userName">Nombre:</label>
            <input type="text" id="userName" name="userName" class="form-input" placeholder="Nombre" value=<?php echo $nombre; ?> readonly>

            <label for="userPhone">Teléfono:</label>
            <input type="text" id="userPhone" name="userPhone" class="form-input" placeholder="Teléfono" value=<?php echo $telefono; ?> readonly>

            <label for="userJob">Cargo:</label>
            <input type="text" id="userJob" name="userJob" class="form-input" placeholder="Cargo" value=<?php echo $cargo; ?> readonly>

            <label for="userSalary">Salario:</label>
            <input type="text" id="userSalary" name="userSalary" class="form-input" placeholder="Salario" value=<?php echo $salario; ?> readonly>
        </div>
        <h2 class="subtitulo">Devengados</h2>
                <div class="form-group">
                    <div class="column">
                        <label for="diasLaborados">Días laborados:</label>
                        <input type="number" id="diasLaborados" name="diasLaborados" class="form-input" placeholder="Días laborados"/>
                        
                        <label for="diasVacaciones">Días de vacaciones:</label>
                        <input type="number" id="diasVacaciones" name="diasVacaciones" class="form-input" placeholder="Días de vacaciones"/>

                        <label for="diasIncapacidad_eps">Días de incapacidad EPS:</label>
                        <input type="number" id="diasIncapacidad_eps" name="diasIncapacidad_eps" class="form-input" placeholder="Días de incapacidad EPS"/>
                        
                        <label for="diasIncapacidad_arl">Días de incapacidad ARL:</label>
                        <input type="number" id="diasIncapacidad_arl" name="diasIncapacidad_arl" class="form-input" placeholder="Días de incapacidad ARL"/>
                        
                        <label for="horasNocturnas">Horas nocturnas:</label>
                        <input type="number" id="horasNocturnas" name="horasNocturnas" class="form-input" placeholder="Horas nocturnas"/>
                        
                        <label for="horasDominicales">Horas dominicales:</label>
                        <input type="number" id="horasDominicales" name="horasDominicales" class="form-input" placeholder="Horas dominicales"/>
                    </div>
                    <div class="column">
                        <label for="salarioDiasLaborados">Salario días laborados:</label>
                        <input type="text" id="salarioDiasLaborados" name="salarioDiasLaborados" class="form-input" placeholder="Salario días laborados" readonly/>
                        
                        <label for="salarioVacaciones">Salario vacaciones disfrutadas:</label>
                        <input type="text" id="salarioVacaciones" name="salarioVacaciones" class="form-input" placeholder="Salario vacaciones disfrutadas" readonly/>
                        
                        <label for="salarioAuxilioTransporte">Salario auxilio de transporte:</label>
                        <input type="text" id="salarioAuxilioTransporte" name="salarioAuxilioTransporte" class="form-input" placeholder="Salario auxilio de transporte" readonly/>
                        
                        <label for="salarioPagoIncapacidadEPS">Salario pago incapacidad EPS:</label>
                        <input type="text" id="salarioPagoIncapacidadEPS" name="salarioPagoIncapacidadEPS" class="form-input" placeholder="Salario pago incapacidad EPS" readonly/>
                        
                        <label for="salarioPagoIncapacidadARL">Salario pago incapacidad ARL:</label>
                        <input type="text" id="salarioPagoIncapacidadARL" name="salarioPagoIncapacidadARL" class="form-input" placeholder="Salario pago incapacidad ARL" readonly/>
                        
                        <label for="recargoNocturno">Recargo nocturno:</label>
                        <input type="text" id="recargoNocturno" name="recargoNocturno" class="form-input" placeholder="Recargo nocturno" readonly/>
                        
                        <label for="recargoDominical">Recargo dominical:</label>
                        <input type="text" id="recargoDominical" name="recargoDominical" class="form-input" placeholder="Recargo dominical" readonly/>
                        
                        <label for="auxilioAlimentacion">Auxilio de alimentación:</label>
                        <input type="text" id="auxilioAlimentacion" name="auxilioAlimentacion" class="form-input" placeholder="Auxilio de alimentación" readonly/>

                        <label >Total devengado:</label>
                        <input type="text" id="CuentaDevengado" name="CuentaDevengado" class="form-input" placeholder="Total Devengado" readonly/>
                    </div>
                </div>
                <div class="button-group">
                    <button class="button" onclick="calcularDevengado()">Calcular Devengados</button>
                </div>
                <h2 class="subtitulo">Deducciones</h2>
                        <div class="column">
                            <label for="salud">Salud:</label>
                            <input type="text" id="salud" name="salud" class="form-input" placeholder="Salud" readonly/>
                    
                            <label for="pension">Pensión:</label>
                            <input type="text" id="pension" name="pension" class="form-input" placeholder="Pensión" readonly/>

                            <label for="fondoSolidaridadPensional">Fondo Solidaridad Pensional:</label>
                            <input type="text" id="fondoSolidaridadPensional" name="fondoSolidaridadPensional" class="form-input" placeholder="Fondo Solidaridad Pensional" readonly/>
                        </div>
                        <div class="column">
                            <label for="desembolso">Desembolso:</label>
                            <input type="number" id="desembolso" name="desembolso" class="form-input" placeholder="Desembolso" value="0"/>
                     

                        
                            <label for="cuotasDescontar">Cuotas a descontar:</label>
                            <input type="number" id="cuotasDescontar" name="cuotasDescontar" class="form-input" placeholder="Cuotas a descontar" value="0"/>
                        

                        
                            <label for="fechaDesembolso">Fecha de Desembolso:</label>
                            <input type="date" id="fechaDesembolso" name="fechaDesembolso" class="form-input"/>
                        

                        
                            <label for="cuotaPagada">Cuota Pagada:</label>
                            <input type="number" id="cuotaPagada" name="cuotaPagada" class="form-input" placeholder="Cuota Pagada" value="0"/>
                        

                        
                            <label for="cuotaPorDescontar">Cuota por Descontar:</label>
                            <input type="number" id="cuotaPorDescontar" name="cuotaPorDescontar" class="form-input" placeholder="Cuota por Descontar" value="0"/>
                        

                        
                            <label for="terminaPrestamo">Termina Prestamo:</label>
                            <input type="date" id="terminaPrestamo" name="terminaPrestamo" class="form-input"/>
                        

                        
                            <label for="valorCuota">Valor Cuota:</label>
                            <input type="number" id="valorCuota" name="valorCuota" class="form-input" placeholder="Valor Cuota" value="0"/>
                        

                        
                            <label for="saldoPrestamo">Saldo Prestamo:</label>
                            <input type="number" id="saldoPrestamo" name="saldoPrestamo" class="form-input" placeholder="Saldo Prestamo" value="0"/>

                            <label >Total deducciones:</label>
                            <input type="text" id="CuentaDeducciones" name="CuentaDeducciones" class="form-input" placeholder="Total Deducciones" readonly/>
                        </div>
                        <div class="button-group">
                            <button class="button" onclick="calcularDeducciones()">Calcular Deducciones</button>
                        </div>
            <h2 class="subtitulo">Nómina</h2>

                        <div class="form-group">
                            <label for="totalDevengado">Total Devengado:</label>
                            <input type="text" id="totalDevengado" name="totalDevengado" class="form-input" placeholder="Total Devengado" readonly/>
                        </div>

                        <div class="form-group">
                            <label for="totalDeducciones">Total Deducciones:</label>
                            <input type="text" id="totalDeducciones" name="totalDeducciones" class="form-input" placeholder="Total Deducciones" readonly/>
                        </div>

                        <div class="form-group">
                            <label for="totalNomina">Total Nómina:</label>
                            <input type="text" id="totalNomina" name="totalNomina" class="form-input" placeholder="Total Nómina" readonly/>
                        </div>
                        <div class="button-group">
                            <button class="button" onclick="calcularTotales()">Calcular Totales</button>
                        </div>
                        <script>
                        function calcularDevengado() {
                            // Calcula el salario y redondea a 2 decimales
                            var salarioDias = ((parseFloat(userSalary.value) * parseFloat(diasLaborados.value)) / 30).toFixed(2);
                            var salarioVacacion = (((parseFloat(userSalary.value)/30) * parseFloat(diasVacaciones.value))).toFixed(2);
                            var auxilioTrans = 140606.00;
                            var incapacidadEPS = (((parseFloat(userSalary.value)/30)*0.6666)*parseFloat(diasIncapacidad_eps.value)).toFixed(2);
                            var incapacidadARL = (((parseFloat(userSalary.value)/30))*parseFloat(diasIncapacidad_arl.value)).toFixed(2);
                            var horaRegular = parseFloat(userSalary.value)/240;
                            var horaNoct = horaRegular*0.35;
                            var nocturno = (horaNoct*parseFloat(horasNocturnas.value)).toFixed(2);
                            var horaDomi = horaRegular*0.75;
                            var dominical = (horaDomi*parseFloat(horasDominicales.value)).toFixed(2);
                            var auxAlimentacion = 67824.00;
                            // Cambiar valores
                            salarioDiasLaborados.value = salarioDias;
                            salarioVacaciones.value = salarioVacacion;
                            salarioAuxilioTransporte.value = auxilioTrans;
                            salarioPagoIncapacidadEPS.value = incapacidadEPS;
                            salarioPagoIncapacidadARL.value = incapacidadARL;
                            recargoNocturno.value = nocturno;
                            recargoDominical.value = dominical;
                            auxilioAlimentacion.value = auxAlimentacion;
                            //totales
                            var totDeven = parseFloat(salarioDias)+parseFloat(salarioVacacion)+parseFloat(auxilioTrans)+parseFloat(incapacidadEPS)+parseFloat(incapacidadARL)+parseFloat(nocturno)+parseFloat(dominical)+parseFloat(auxAlimentacion);
                            CuentaDevengado.value = (parseFloat(totDeven)).toFixed(2);
                        }
                        function calcularDeducciones() {
                            // Calcula el salario y redondea a 2 decimales
                            var valorSalud = (parseFloat(userSalary.value) * 0.04).toFixed(2);
                            var valorPension = (parseFloat(userSalary.value) * 0.04).toFixed(2);
                            var valorFondoSolidario = (parseFloat(userSalary.value) * 0.01).toFixed(2);
                            // Cambiar valores
                            salud.value = valorSalud;
                            pension.value = valorPension;
                            fondoSolidaridadPensional.value = valorFondoSolidario;
                            //total
                            var totDedu = parseFloat(valorSalud)+parseFloat(valorPension)+parseFloat(valorFondoSolidario)+(parseFloat(cuotaPagada.value)*parseFloat(valorCuota.value));
                            CuentaDeducciones.value = (parseFloat(totDedu)).toFixed(2);
                        }
                        function calcularTotales() {
                            //totales
                            var totNomina = parseFloat(CuentaDevengado.value)-parseFloat(CuentaDeducciones.value);
                            
                            totalDevengado.value = parseFloat(CuentaDevengado.value);
                            totalDeducciones.value = parseFloat(CuentaDeducciones.value);
                            totalNomina.value = totNomina;
                        }
                        </script>
            <div class="button-group">
            <form action="./../models/ingNominaLinks.php" method="post">
                    <button class="button" name="agregarNomina">Agregar nomina</button>
                    <button class="button" name="regresarIndex">Regresar</button>
            </form>
            </div>
    </div>
    
</body>
</html>