<?php
    function connect(){
        $host="localhost";
        $user="root";
        $pass="";
        $db="nomina";
        $url=mysqli_connect($host,$user,$pass) or die("No se pudo conectar a la base de datos" .mysqli_error($url));
        mysqli_select_db($url,$db) or die("No se pudo seleccionar a la base de datos" .mysqli_error($url));

        return $url;
    }
?> 