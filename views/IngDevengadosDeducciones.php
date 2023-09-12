<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Devengados | Deducciones</title>
    <link rel="stylesheet" href="./../public/css/base.css">
    <link rel="stylesheet" href="./../public/css/styles.css">
</head>
<body>
    <header>
        <h1>Ingresar Devengados | Deducciones</h1>
    </header>
    <form action="" method="post">
    <div class="container">
        <div class="form-group">
            <label for="id">Ingrese el id de su empleado</label>
            <input type="number" name="id" placeholder="Ingrese c.c empleado">
        </div>
        <h2 class="subtitulo">Devengados</h2>
            <div class="form-group">
                <label for="diasLaborados">Dias laborados</label>
                <input type="number" id="diasLaborados" name="diasLaborados" class="form-input" placeholder="Dias laborados"/>
            </div>
            <div class="form-group">
            <h3 class="subtituloMenor">Auxilios:</h3>
                <label for="auxilioTransporte">Transporte:</label>
                <input type="number" id="auxilioTransporte" name="auxilioTransporte" class="form-input" placeholder="Auxilio transporte"/>

                <label for="auxilioAlimentacion">Alimentación:</alimentacionel>
                <input type="number" id="auxilioAlimentacion" name="auxilioAlimentacion" class="form-input" placeholder="Auxilio alimentacion"/>
            </div>
            <hr>
            <div class="form-group diasIncapacidad">
                <h3 class="subtituloMenor">Dias de incapacidad :</h3>
                <label for="diasIncapacidad_eps">Eps:</label>
                <input type="number" id="diasIncapacidad_eps" name="diasIncapacidad_eps" class="form-input" placeholder="Dias de incapacidad eps"/>
                <label for="diasIncapacidad_arl">Arl:</label>
                <input type="number" id="diasIncapacidad_arl" name="diasIncapacidad_arl" class="form-input" placeholder="Dias de incapacidad arl"/>
            </div>
            <hr>
            <div class="form-group">
                <label for="diasVacaciones">Dias de vacaciones:</label>
                <input type="number" id="diasVacaciones" name="diasVacaciones" class="form-input" placeholder="Dias de vacaciones"/>
            </div>
            <h2 class="subtitulo">Deducciones</h2>
            <div class="form-group">
                <label for="salud">Salud:</label>
                <input type="number" id="salud" name="salud" class="form-input" placeholder="Salud"/>
            </div>
            <div class="form-group">
                <label for="salud">Pension:</label>
                <input type="number" id="pension" name="pension" class="form-input" placeholder="pension"/>
            </div>
            <div class="form-group">
                <label for="salud">Fondo de solidaridad pensional:</label>
                <input type="number" id="fondoSolidaridadPensional" name="fondoSolidaridadPensional" class="form-input" placeholder="Fondo de solidaridad pensional"/>
            </div>
            <div class="button-group">
                    <button class="button" name="actualizar">Agregar</button>
                    <button class="button" name="regresarIndex">Regresar</button>
            </div>
    </div>
    </form>
</body>
</html>