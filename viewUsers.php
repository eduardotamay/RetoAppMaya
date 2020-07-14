<?php
    include_once("CTest.php");
    $objQuestion = new testMaya();
    $result = $objQuestion->seeAllUser();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/table.css">
    <title>Answers</title>
</head>

<body>
    <div id="wrapper">
        <h1 style="font-size:25px;margin-bottom:0px;">Tabla de Usuarios</h1>
        <table id="keywords" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th><span>Nombre</span></th>
                    <th><span>Apellido</span></th>
                    <th><span>Ciudad/Pueblo</span></th>
                    <th><span>Respuestas</span></th>
                    <th><span>Calificación</span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count=1;
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $count." - ".$row['names'];?></td>
                    <td><?php echo $row['lastname'];?></td>
                    <td><?php echo $row['country'];?></td>
                    <td><?php echo $row['answerUser'];?></td>
                    <td><?php echo $row['calification'];?></td>
                </tr>
                <?php
                    $count= $count +1; 
                }//Fin While
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js"></script>
</body>
</html>