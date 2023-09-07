<?php

if (isset($_POST['AgregarEmp'])) {
    include("./../config/database.php");
    $con = connect();

    $id = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $id_cargo = $_POST['cargo'];
    $consulta ="INSERT INTO empleado VALUES ('$id','$nombre','$edad', '$direccion', '$telefono', '$id_cargo');";
    $result = mysqli_query($con, $consulta);
    if($result){
        echo '<script>alert("Se agrego correctamente el empleado")</script>';
    }else{
        echo '<script>alert("ERROR: No se agrego el empleado")</script>';
    }
  exit();
}

if (isset($_POST['regresarIndex'])) {
  header('Location: ./../index.php');
exit();
}

?>