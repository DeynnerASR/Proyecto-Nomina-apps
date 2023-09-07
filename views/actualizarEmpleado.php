<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos del Empleado</title>
    <link rel="stylesheet" href="./../public/css/base.css">
    <link rel="stylesheet" href="./../public/css/styles.css">
</head>
<body>
    <?php 
    include("./../config/database.php");
    $con = connect();
    $id = $_GET['id'];

    $consulta = "SELECT * FROM empleado WHERE id = '$id'";
    $result1 = mysqli_query($con, $consulta);
    if($result1){
        while($row = $result1->fetch_array()){
            $nombre = $row['nombre'];
            $edad = $row['edad'];
            $direccion = $row['direccion'];
            $telefono = $row['telefono'];
            $cargo = $row['id_cargo'];
        }
    }
    
    ?>
    <header>
        <h1>Actualizar Datos del Empleado</h1>
    </header>
    <form action="./../models/actualizarEmpLink.php" method="post">
    <div class="container">
            <div class="form-group">
                <label for="codigo">Ingresa Código del Empleado:</label>
                <input type="text" id="codigo" name="codigo" class="form-input" placeholder="Código" value=<?php echo $id; ?> readonly/>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Nombre" value=<?php echo $nombre; ?> />
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="text" id="edad" name="edad" class="form-input" placeholder="Edad" value=<?php echo $edad; ?> />
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" class="form-input" placeholder="Dirección" value=<?php echo $direccion; ?> />
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" class="form-input" placeholder="Teléfono" value=<?php echo $telefono; ?> />
            </div>
            <div class="form-group">
                <label for="cargo">ID del Cargo a Ocupar:</label>
                <input type="text" id="cargo" name="cargo" class="form-input" placeholder="ID Cargo" value=<?php echo $cargo; ?> />
            </div>
            <h2 class="cargosDisponibles">Cargos Disponibles</h2>
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
                
                    <button class="button" name="actualizar">Actualizar empleado</button>
                    <button class="button" name="regresarIndex">Regresar</button>
                
            </div>
    </div>
    </form>
</body>
</html>
