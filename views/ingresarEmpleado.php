<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Empleado</title>
    <link rel="stylesheet" href="./../public/css/base.css">
    <link rel="stylesheet" href="./../public/css/styles.css">
</head>
<body>
    <header class="headerAgregar">
        <h1>Agregar un nuevo empleado</h1>
    </header>
    <form action="./../models/ingresarEmpLinks.php" method="post">
    <div class="container">
            <div class="form-group">
                <label for="codigo">Ingresa Código del Empleado:</label>
                <input type="text" id="codigo" name="codigo" class="form-input" placeholder="Código" />
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Nombre" />
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="text" id="edad" name="edad" class="form-input" placeholder="Edad" />
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" class="form-input" placeholder="Dirección" />
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" class="form-input" placeholder="Teléfono" />
            </div>
            <div class="form-group">
                <label for="cargo">ID del Cargo a Ocupar:</label>
                <select id="cargo_ocupar" name="cargo_ocupar">
                    <?php 
                        include("./../config/database.php");
                        $con = connect();
                        $consulta1 = "SELECT * FROM cargo";
                            $result1 = mysqli_query($con, $consulta1);
                            if($result1){
                                while($row = $result1->fetch_array()){
                                    $cod = $row['id_cargo'];
                                    $puesto = $row['puesto'];
                                        ?>
                                            <option value=<?php echo $cod; ?>><?php echo $puesto; ?></option>
                                        <?php
                                }
                            }
                    ?>
                    
                </select>
                <p>Cargo seleccionado: <span id="cargoSeleccionado"></span></p>
                <script>
                    // Obtener el elemento select y el elemento donde mostrar el color seleccionado
                    const cargo = document.getElementById('cargo_ocupar');
                    const cargoSeleccionado = document.getElementById('cargoSeleccionado');

                    // Manejar el evento de cambio (cuando se selecciona una opción)
                    cargo.addEventListener('change', function() {
                        const cargoElegido = cargo.value;
                        cargoSeleccionado.textContent = cargoElegido;
                    });
                </script>
            </div>
            <h2 class="cargosDisponibles">Lista de Cargos Disponibles</h2>
            <table>
                <tr>
                    <th>ID Cargo</th>
                    <th>Puesto</th>
                    <th>Centro de Costo</th>
                    <th>Sueldo</th>
                </tr>
                <?php 
                    $consulta = "SELECT * FROM cargo";
                        $result = mysqli_query($con, $consulta);
                        if($result){
                            while($row = $result->fetch_array()){
                                $cod = $row['id_cargo'];
                                $puesto = $row['puesto'];
                                $centro_costo = $row['centro_costo'];
                                $sueldo = $row['sueldo'];
                                    ?>
                                        <tr>
                                        <td><?php echo $cod; ?></td>
                                        <td><?php echo $puesto; ?></td>
                                        <td><?php echo $centro_costo; ?></td>
                                        <td><?php echo $sueldo; ?></td>
                                        </tr>
                                    <?php
                            }
                        }
                ?>
            </table>
            <div class="button-group">
                
                    <button class="button" name="AgregarEmp">Agregar empleado</button>
                    <button class="button" name="regresarIndex">Regresar</button>
                
            </div>
    </div>
    </form>
</body>
</html>
