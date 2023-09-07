<?php 
    include("./../config/database.php");
    $con = connect();
    $id = $_POST['codigo'];

    if (isset($_POST['actualizar'])) {
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $id_cargo = $_POST['cargo'];
        $consulta ="UPDATE empleado 
                    SET nombre = '$nombre', edad = '$edad', direccion = '$direccion', telefono = '$telefono', id_cargo = '$id_cargo' 
                    WHERE id = '$id'";
        $result = mysqli_query($con, $consulta);
        if($result){
          echo '<script>
                alert("Se actualizo correctamente el empleado")
                location.assign("./../index.php");
                </script>';
        }else{
            '<script>
            alert("FATAL ERROR: No se actualizo correctamente el empleado")
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