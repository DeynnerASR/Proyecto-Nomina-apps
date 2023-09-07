<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/base.css">
    <link rel="stylesheet" href="../public/css/styleDesprendible.css">
    <title>Desprendible</title>
    <style>
        @media print {
            #imprimirPDF {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="containerTables">
        <table>
            <tr>
                <th class=title colspan="6">
                    <div class="header">
                            Desprendible de nomina
                        <div class="logo">
                            <img src="https://i.ibb.co/qxmz4zq/tecnologia.png" alt="tecnologia">
                            ByteMasters S.A.S
                        </div>
                         
                    </div> 
                </th>
            </tr>
            <?php
                include("../config/database.php");
                $con=connect();
                $id = $_GET['id'];
                $sql="SELECT e.*,c.*,d.*,de.*,n.* FROM empleado e
                LEFT JOIN cargo as c ON e.id_cargo=c.id_cargo
                LEFT JOIN devengado as d ON e.id=d.id
                LEFT JOIN deducciones as de ON e.id=de.id
                LEFT JOIN nomina as n ON e.id=n.id_empleado
                WHERE e.id=$id";
                $res=mysqli_query($con,$sql) or die("Error en la consulta $sql".mysqli_error($con));
                if (mysqli_num_rows($res) == 0) {
                    echo '<script>alert("No se encontraron registros para el ID ' . $id . '");</script>';
                    echo '<script>window.close();</script>';
                } else {
                    $empleado = mysqli_fetch_assoc($res);
                    $nombre = $empleado['nombre'];
                    $identificacion = $empleado['id'];
                    $centro_costo = $empleado['centro_costo'];
                    $dias_laborados = $empleado['dias_laborados']; 
                    $sueldo = $empleado['salario_dias_laborados'];
                    $auxilio_no_prestacional = $empleado['aux_alimentacion'];
                    $auxilio_transporte =$empleado['auxilio_transporte'];
                    $salud = $empleado['salud'];
                    $extraturno = $empleado['recargo_nocturno']+$empleado['recargo_dominical'];
                    $dias_extraturno = $empleado['horas_dominicales']+$empleado['horas_nocturnas'];
                    $pension = $empleado['pension'];
                    $incapacidad =$empleado['pago_incapacidad_eps']+$empleado['pago_incapacidad_arl'];
                    $dias_incapacidad=$empleado['dias_incapacidad_eps']+$empleado['dias_incapacidad_arl'];
                    $vacaciones =$empleado['vacaciones_disfrutadas'];
                    $dias_vacaciones=$empleado['dias_vacaciones'];
                    $fondo_solidaridad_pensional = $empleado['fondo_solidaridad_pensional'];
                    $prestamo = $empleado['desembolso'];
                    $total_devengado = $empleado['total_devengado'];
                    $total_deducido = $empleado['total_deducciones'];
                    $neto_pagar = $empleado['total_nomina'];
                    $cuota_a_descontar = $empleado['cuotas_a_descontar'];
                    $cuota_pagada = $empleado['cuota_pagada'];
                    $cuotas_por_descontar = $empleado['cuota_por_descontar'];
                    $valor_cuota= $empleado['valor_cuota'];
                }
            ?>
            <tr>
                <th >
                    Nombre
                </th>
                <td colspan="2">
                    <?php echo $nombre ?>
                </td>
                <th colspan = "4">
                    Fecha 
                </th>
            </tr>
            <tr>
                <th>
                    Identificacion
                </th>
                 <td colspan = "2">
                    <?php echo $identificacion ?>
                </td>
                <th colspan="4">
                    Nomina del 01 al 30 de abril 2019   
                </th>
            </tr>
            <tr>
                <th colspan="1">
                    Centro costo
                </th>
                <td colspan="3">
                    <?php echo $centro_costo ?>
                </td>
                <th colspan="1" >
                    Dias laborados
                </th>
                 <td colspan = "1">
                    <?php echo $dias_laborados ?>
                </td>
            </tr>
            <tr>
                <th colspan="1">
                    Salario mensual
                </th>
                <td colspan="2">
                    <?php echo $sueldo ?>
                </td>
                <th colspan="1" >
                    Auxilio no prestacional
                </th>
                 <td colspan = "2">
                    <?php echo $auxilio_no_prestacional ?>
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Auxilio de transporte
                </th>
                <td colspan="4">
                    <?php echo $auxilio_transporte ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">
                    DEVENGADOS
                </th>
                <th colspan="3">
                    DEDUCIDOS
                </th>
            </tr>
            <tr>
                <th class="pagos" colpan="1">
                    Concepto
                </th>
                <th class="pagos" colpan="1">
                    Dias/Horas
                </th>
                <th class="pagos" colpan="1">
                    Valor
                </th>

                <th class="pagos" colpan="1">
                    Concepto
                </th>
                <th class="pagos" colpan="1">
                    Dias/Horas
                </th>
                <th class="pagos" colpan="1">
                    Valor
                </th>
            </tr>

            <tr>
                <th colpan="1">
                    Salud
                </th>
                <td colpan="1">
                    30
                </td>
                <td colpan="1">
                   <?php echo $salud ?>
                </td>

                <th colpan="1">
                    Salud
                </th>
                <td colpan="1">
                    30
                </td>
                <td colpan="1">
                    0    
                </td>
            </tr>

            <tr>
                <th colpan="1">
                    Extraturno
                </th>
                <td colpan="1">
                    <?php echo $dias_extraturno ?>
                </td>
                <td colpan="1">
                     <?php echo $extraturno ?>
                </td>

                <th colpan="1">
                    Pension
                </th>
                <td colpan="1">
                    30
                </td>
                <td colpan="1">
                    0
                </td>
            </tr>

            <tr>
                <th colpan="1">
                    auxilio no prestacional
                </th>
                <td colpan="1">
                    30
                </td>
                <td colpan="1">
                     <?php echo $auxilio_no_prestacional ?>
                </td>

                <th colpan="1">
                    Fondo de solidaridad pensional
                </th>
                <td colpan="1">
                    30
                </td>
                <td colpan="1">
                    <?php echo $fondo_solidaridad_pensional ?>
                </td>
            </tr>

            <tr>
                <th colpan="1">
                    Auxilio de transporte
                </th>
                <td colpan="1">
                    30
                </td>
                <td colpan="1">
                    <?php echo $auxilio_transporte ?>
                </td>

                <th colpan="1">
                    Anticipos
                </th>
                <td colpan="1">
                    30
                </td>
                <td colpan="1">
                    0
                </td>
            </tr>

            <tr>
                <th colpan="1">
                    Auxilio incapacidad
                </th>
                <td colpan="1">
                    <?php echo $dias_incapacidad ?>
                </td>
                <td colpan="1">
                    <?php echo $incapacidad ?>
                </td>

                <th colpan="1">
                    Prestamos
                </th>
                <td colpan="1">
                    30
                </td>
                <td colpan="1">
                    <?php echo $prestamo ?>
                </td>
            </tr>

            <tr>
                <th colpan="1">
                    Vacaciones disfrutadas
                </th>
                <td colpan="1">
                    <?php echo $dias_vacaciones ?>
                </td>
                <td colpan="1">
                    <?php echo $vacaciones ?>
                </td>

                <th colpan="1">
                    Anticipo vacaciones pagas
                </th>
                <td colpan="1">
                    30
                </td>
                <td colpan="1">
                    0
                </td>
            </tr>
            <tr>
                <th class="pagos" colspan="2">
                    TOTAL DEVENGADOS
                </th>
                <td class="pagos" colspan="1">
                    <?php echo $total_devengado ?>
                </td>
                <th class="pagos" colspan="2">
                    TOTAL DEDUCIDOS
                </th>
                <td class="pagos" colspan="1">
                    <?php echo $total_deducido ?>
                </td>
            </tr>
            <tr>
                <td class="vacio"  colspan="3">
                </td>
                <th class="pagos" colspan="2">
                    NETO A PAGAR
                </th>
                <td class="pagos" colspan="1">
                    <?php echo $neto_pagar ?>   
                </td>
            </tr>
        </table>
            <div class="tablePrestamo">
                <div class="firma">
                    <p>Recibí de conformidad y acepto en todas partes este pago:</p>
                    <br></br>
                    <hr>
                    <p> <?php echo $nombre ?> <br>No. C.C: <?php echo $identificacion ?></p>    
                </div>
                <table>
                <tr>
                    <th class="pagos">
                        Informacion prestamo
                    </th>
                    <th class="pagos">
                        Cuota
                    </th>
                    <th class="pagos">
                        Valor
                    </th>
                </tr>
                <tr>
                    <td>
                        Valor inicial
                    </td>
                    <td>
                        <?php echo $cuota_a_descontar ?>
                    </td>
                    <td>
                        <?php echo ($valor_cuota*$cuota_a_descontar)?>
                    </td>
                </tr>
                <tr>
                    <td>
                        No. Cuota descontada
                    </td>
                    <td>
                        <?php echo $cuota_pagada ?>
                    </td>
                    <td>
                        <?php echo ($valor_cuota*$cuota_pagada)?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Cuotas por descontar
                    </td>
                    <td>
                        <?php echo $cuotas_por_descontar ?>
                    </td>
                    <td>
                         <?php echo ($valor_cuota*$cuotas_por_descontar)?>
                    </td>
                </tr>
                </table>
            </div>
        </div>
        <button id="imprimirPDF" onclick="print()">Imprimir a PDF</button>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script>
        window.html2canvas =html2canvas;
        window.jsPDF =window.jsdf.jsPDF;

        function printPdf(){
            html2canvas(document.querySelector('.containerTables'),{
                allowTaint:true,
                useCORS: true,
                scale: 0.75
            }).then(canvas=>{
                document.body.appendChild(canvas)
                var img = canvas.toDataURL("image/png");
                var pdf = new jsPDF();
                pdf.setFont('Arial');
                pdf.setFontSize(12);
                pdf.addImage(img,'PNG',7,13,195,105);
                pdf.save('desprendible.pdf');
            });
        }
    </script>
</body>
</html>