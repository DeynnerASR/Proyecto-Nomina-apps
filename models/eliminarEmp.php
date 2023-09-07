<?php 
    include("./../config/database.php");
    $con = connect();
    $id = $_GET['id'];

        $consulta ="DELETE FROM nomina WHERE id_empleado = '$id'";
        $result = mysqli_query($con, $consulta);
        if($result){
            $consulta ="DELETE FROM devengado WHERE id = '$id'";
            $result1 = mysqli_query($con, $consulta);
            if($result1){
                $consulta ="DELETE FROM deducciones WHERE id = '$id'";
                $result2 = mysqli_query($con, $consulta);
                if($result2) {
                    $consulta ="DELETE FROM prestaciones_sociales WHERE id = '$id'";
                    $result3 = mysqli_query($con, $consulta);
                if($result3) {
                    $consulta ="DELETE FROM empleado WHERE id = '$id'";
                    $result4 = mysqli_query($con, $consulta);
                    if($result4) {
                        echo '<script>alert("Se elimino correctamente el empleado")</script>';
                        header('Location: ./../index.php');
                        }
                    }
                }
            }
        }else{
            echo '<script>alert("ERROR: No se elimino el empleado")</script>';
            header('Location: ./../index.php');
        }

    ?>