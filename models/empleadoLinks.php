<?php

if (isset($_POST['añadirEmpleado'])) {
    header('Location: ./../views/ingresarEmpleado.php');
  exit();
}
if (isset($_POST['consultarNomina'])) {
  header('Location: ./../views/vistanomina.php');
exit();
}
?>