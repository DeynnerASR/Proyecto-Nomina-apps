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
          header('Location: ./../index.php');
          echo '<script>alert("Se actualizo correctamente el empleado")</script>';
        }else{
            echo '<script>alert("ERROR: No se actualizo el empleado")</script>';
            header('Location: ./../index.php');
        }
      exit();
    }
    
    if (isset($_POST['regresarIndex'])) {
      header('Location: ./../index.php');
    exit();
    }
    

    ?>