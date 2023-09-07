<?php 
    include("./../config/database.php");
    $con = connect();
    $id = $_GET['id'];

        $consulta ="DELETE FROM empleado 
                    WHERE id = '$id'";
        $result = mysqli_query($con, $consulta);
        if($result){
          echo '<script>alert("Se elimino correctamente el empleado")</script>';
          header('Location: ./../index.php');
        }else{
            echo '<script>alert("ERROR: No se elimino el empleado")</script>';
        }

    ?>