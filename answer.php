<?php
    include_once("CTest.php");
    if ($_GET['name']!="") {
        $name = $_GET['name'];
        $objQuestion = new testMaya();
        $result = $objQuestion->seeQuestion();
        $resultUser = $objQuestion->seeUser($name);
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
    <?php
            foreach($resultUser as $row)
            {
                $nombre=$row['names'];
                $apellido = $row['lastname'];
                $id=$row['id'];
                $califi = $row['calification'];
            }
        ?>
        <h1 style="font-size:25px;margin-bottom:0px;">Tabla de resultados <?php echo "[".$califi." de 10]" ?></h1>
        <p style="text-align:center;font-size:20px;margin-bottom:5px;" >(<?php echo $nombre." ".$apellido?>)</p>
        <?php
            $nom = '';
            $respuestas = '';
            foreach($resultUser as $row)
            {
                $nom=$row['names'];
                $respuestas = $row['answerUser']; //Le asigno el string que tengo en mi BD
            }
            $arrAnsw = explode( ',', $respuestas); //Separo las respuestas en un ARRAY
        if ($nom=="") {
            header('Location: index.php');
        }
        ?>
        <table id="keywords" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th><span>Pregunta</span></th>
                    <th><span>Opciones</span></th>
                    <th><span>Respuesta Correcta</span></th>
                    <th><span>Su respuesta</span></th>
                    <th><span>Estado</span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $cont =0;
                    $cal = 0;
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td class="lalign"><?php echo $row['question'];?></td>
                    <td><strong><?php echo $row['optionA'];?></strong>  <strong><?php echo $row['optionB'];?></strong>  
                         <strong><?php echo $row['optionC'];?></strong>  <strong><?php echo $row['optionD'];?></strong></td>
                    <td><strong><?php echo $row['answer'].")"?></strong></td>
                    <td><strong><?php echo $arrAnsw[$cont].")"?></strong></td>
                    <td><?php if($row['answer']==$arrAnsw[$cont]){echo '<img src="ico/ok.ico" alt="Bien">'; $cal=$cal+1;}else{echo '<img src="ico/mal.ico" alt="Mal">';}?></td>
                </tr>
                <?php 
                    $cont = $cont+1;
                }
                $updatedCal = $objQuestion->updateCal($cal,$id);
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js"></script>
</body>
</html>
<?php
}else{
    header('Location: index.php');
}
?>