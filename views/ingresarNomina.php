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
    <form action="" method="post">
    <div class="container">
        <div class="user-info">
            <label for="userId">ID:</label>
            <input type="text" id="userId" name="userId" class="form-input" placeholder="ID" disabled>

            <label for="userName">Nombre:</label>
            <input type="text" id="userName" name="userName" class="form-input" placeholder="Nombre" disabled>

            <label for="userPhone">Teléfono:</label>
            <input type="text" id="userPhone" name="userPhone" class="form-input" placeholder="Teléfono" disabled>

            <label for="userJob">Cargo:</label>
            <input type="text" id="userJob" name="userJob" class="form-input" placeholder="Cargo" disabled>
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
                        <input type="text" id="salarioDiasLaborados" name="salarioDiasLaborados" class="form-input" placeholder="Salario días laborados" disabled/>
                        
                        <label for="salarioVacaciones">Salario vacaciones disfrutadas:</label>
                        <input type="text" id="salarioVacaciones" name="salarioVacaciones" class="form-input" placeholder="Salario vacaciones disfrutadas" disabled/>
                        
                        <label for="salarioAuxilioTransporte">Salario auxilio de transporte:</label>
                        <input type="text" id="salarioAuxilioTransporte" name="salarioAuxilioTransporte" class="form-input" placeholder="Salario auxilio de transporte" disabled/>
                        
                        <label for="salarioPagoIncapacidadEPS">Salario pago incapacidad EPS:</label>
                        <input type="text" id="salarioPagoIncapacidadEPS" name="salarioPagoIncapacidadEPS" class="form-input" placeholder="Salario pago incapacidad EPS" disabled/>
                        
                        <label for="salarioPagoIncapacidadARL">Salario pago incapacidad ARL:</label>
                        <input type="text" id="salarioPagoIncapacidadARL" name="salarioPagoIncapacidadARL" class="form-input" placeholder="Salario pago incapacidad ARL" disabled/>
                        
                        <label for="recargoNocturno">Recargo nocturno:</label>
                        <input type="text" id="recargoNocturno" name="recargoNocturno" class="form-input" placeholder="Recargo nocturno" disabled/>
                        
                        <label for="recargoDominical">Recargo dominical:</label>
                        <input type="text" id="recargoDominical" name="recargoDominical" class="form-input" placeholder="Recargo dominical" disabled/>
                        
                        <label for="auxilioAlimentacion">Auxilio de alimentación:</label>
                        <input type="text" id="auxilioAlimentacion" name="auxilioAlimentacion" class="form-input" placeholder="Auxilio de alimentación" disabled/>
                    </div>
                </div>
                <div class="button-group">
                    <button class="button" name="calcularDevengado">Calcular datos</button>
                </div>
                <h2 class="subtitulo">Deducciones</h2>
                        <div class="column">
                            <label for="salud">Salud:</label>
                            <input type="text" id="salud" name="salud" class="form-input" placeholder="Salud" disabled/>
                    
                            <label for="pension">Pensión:</label>
                            <input type="text" id="pension" name="pension" class="form-input" placeholder="Pensión" disabled/>

                            <label for="fondoSolidaridadPensional">Fondo Solidaridad Pensional:</label>
                            <input type="text" id="fondoSolidaridadPensional" name="fondoSolidaridadPensional" class="form-input" placeholder="Fondo Solidaridad Pensional" disabled/>
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
                        </div>
                        <div class="button-group">
                            <button class="button" name="calcularDeducciones">Calcular datos</button>
                        </div>
            <h2 class="subtitulo">Nómina</h2>

                        <div class="form-group">
                            <label for="totalDevengado">Total Devengado:</label>
                            <input type="number" id="totalDevengado" name="totalDevengado" class="form-input" placeholder="Total Devengado" value="0" disabled>
                        </div>

                        <div class="form-group">
                            <label for="totalDeducciones">Total Deducciones:</label>
                            <input type="number" id="totalDeducciones" name="totalDeducciones" class="form-input" placeholder="Total Deducciones" value="0" disabled>
                        </div>

                        <div class="form-group">
                            <label for="totalNomina">Total Nómina:</label>
                            <input type="number" id="totalNomina" name="totalNomina" class="form-input" placeholder="Total Nómina" value="0" disabled>
                        </div>
            <div class="button-group">
                    <button class="button" name="actualizar">Agregar nomina</button>
                    <button class="button" name="regresarIndex">Regresar</button>
            </div>
    </div>
    </form>
</body>
</html>