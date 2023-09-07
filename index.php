<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Empleados</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header>
        <h1>Consultar Empleados</h1>
    </header>
    <div class="container">
        <table>
            <tr>
                <th colspan="6">Información general</th>
            </tr>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Cargo</th>
                <th>ACCIONES</th>
            </tr>
            <?php 
                include("config/database.php");
                $con = connect();
                $consulta = "SELECT empleado.id, empleado.nombre, empleado.edad, empleado.direccion, empleado.telefono, cargo.puesto
                FROM empleado NATURAL JOIN cargo";
                    $result = mysqli_query($con, $consulta);
                    if($result){
                        while($row = $result->fetch_array()){
                            $id = $row['id'];
                            $nombre = $row['nombre'];
                            $edad = $row['edad'];
                            $direccion = $row['direccion'];
                            $telefono = $row['telefono'];
                            $cargo = $row['puesto'];
                                ?>
                                    <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $nombre; ?></td>
                                    <td><?php echo $edad; ?></td>
                                    <td><?php echo $direccion; ?></td>
                                    <td><?php echo $telefono; ?></td>
                                    <td><?php echo $cargo; ?></td>
                                    <td>
                                    <?php echo '<a href="views/actualizarEmpleado.php?id='.$id.'"><input type="button" value="Actualizar"></a>'; ?>
                                    -
                                    <?php echo '<a href="models/eliminarEmp.php?id='.$id.'"><input type="button" value="Eliminar"></a>'; ?>
                                    </td>
                                    </tr>
                                <?php
                        }
                    }
            ?>
        </table>
        <br>
            <form action="models/empleadoLinks.php" method="post">
            <button class="button" name="añadirEmpleado">Añadir Nuevo Empleado</button>
            <button class="button" name="consultarNomina">Consultar datos nomina</button>
            </form>
    </div>
</body>
</html>
