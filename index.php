<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://bootsnipp.com/snippets/featured/success-and-error-icon-animation">
    <title>Reto Maya</title>
</head>

<body>
    <div class="boxCues">
        <h4 class="cuantoSabes">¿Cuánto sabes de la gramática maya?</h4>
        <p class="teAnimas">Te animas al reto?</p>
    </div>
  <div id="succes">
  </div>
  <div id="error">
  </div>
    <!-- multistep form -->
    <form autocomplete="off" id="msform" name="testMaya">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Jun</li>
            <li>Ka'</li>
            <li>Oox</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Poner datos</h2>
            <h3 class="fs-subtitle">(Si pasas este reto, aparecerá tu nombre en la página de Facebook de Tuukul Kuxtal)
            </h3>
            <input type="text" class="" id="name" name="name" placeholder="Nombre" />
            <input type="text" class="" id="lastname" name="lastname" placeholder="Apellido" />
            <input type="text" class="" id="country" name="country" placeholder="Pueblo/Ciudad" />
            <input type="button" id="seguir" name="next" class="next action-button seguir" value="Seguir"
                onclick="radio_value_date();" />
        </fieldset>
        <?php 
        include_once("CTest.php");

        $objQuestion = new testMaya();
        $result = $objQuestion->seeQuestion();
        while ($row = mysqli_fetch_array($result)) {
          if ($row['id']!='10') {
    ?>
        <fieldset>
            <!-- pdf gramatica maya pag16 y pag25 -->
            <?php
      if ($row['id']<=1) {
        echo "<h4 class='fs-title'>Escoge la letra que corresponde a la palabra que hace falta en cada oración</h4>";
      }
        echo "<h3 class='fs-subtitle'> [ ".$row['id']." de 10 ] </h3>";
    ?>
            <h3 class="fs-subtitle"><?php echo $row['question'];?></h3>
            <input type="radio" id="a" name="<?php echo "option".$row['id'];?>" value="a" />
            <label id="labelO" class="form-check-label" for="exampleRadios1"><?php echo $row['optionA'];?></label>
            <input type="radio" id="b" name="<?php echo "option".$row['id'];?>" value="b" />
            <label id="labelO" class="form-check-label" for="exampleRadios1"><?php echo $row['optionB'];?></label>
            <input type="radio" id="c" name="<?php echo "option".$row['id'];?>" value="c" />
            <label id="labelO" class="form-check-label" for="exampleRadios1"><?php echo $row['optionC'];?></label>
            <input type="radio" id="d" name="<?php echo "option".$row['id'];?>" value="d" />
            <label id="labelO" class="form-check-label" for="exampleRadios1"><?php echo $row['optionD'];?></label>
            <input type="button" name="previous" class="previous action-button" value="Regresar" />
            <input type="button" id="seguir" name="next" class="next action-button" value="Seguir" />
        </fieldset>
        <?php }else{ ?>
        <fieldset>
            <?php
        if ($row['id']<=1) {
          echo "<h4 class='fs-title'>Escoge la letra que corresponde a la palabra que hace falta en cada oración</h4>";
        }
          echo "<h3 class='fs-subtitle'> [ ".$row['id']." de 10 ] </h3>";
      ?>
            <h3 class="fs-subtitle"><?php echo $row['question'];?></h3>
            <input type="radio" id="a" name="<?php echo "option".$row['id'];?>" value="a" />
            <label id="labelO" class="form-check-label" for="exampleRadios1"><?php echo $row['optionA'];?></label>
            <input type="radio" id="b" name="<?php echo "option".$row['id'];?>" value="b" />
            <label id="labelO" class="form-check-label" for="exampleRadios1"><?php echo $row['optionB'];?></label>
            <input type="radio" id="c" name="<?php echo "option".$row['id'];?>" value="c" />
            <label id="labelO" class="form-check-label" for="exampleRadios1"><?php echo $row['optionC'];?></label>
            <input type="radio" id="d" name="<?php echo "option".$row['id'];?>" value="d" />
            <label id="labelO" class="form-check-label" for="exampleRadios1"><?php echo $row['optionD'];?></label>
            <input type="button" name="previous" class="previous action-button" value="Regresar" />
            <input type="button" class="submit action-button terminar" value="Terminar" />
        </fieldset>
        <?php } } ?>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>