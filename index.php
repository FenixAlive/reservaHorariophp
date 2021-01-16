<?php
    require 'db_conn.php';
    $state = $conn->query("SELECT * FROM horario ORDER BY id ASC");
    $i = 0
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header>
    <div id="title">Reserva tu Horario:</div>
</header>
<main class="container" id="container">
    <div class="head sticky" id="n<?php echo $i ?>">
        <div class="hora"><b>Hora</b></div> 
        <div class="conta" id="-1"><b>Disponibles</b></div>
    </div>
    <?php while($hora = $state->fetch(PDO::FETCH_ASSOC)) {?>
        <?php 
            $ho = $i%2 ? (8+floor($i/2)).":30": (8+ $i*.5).":00";
        ?>
        <?php if($hora['disponible'] == 0){ ?>
            <div class="roja" id="n<?php echo $i ?>">
                <div class="hora"><?php echo $ho?></div> 
                <div class="conta" id="c<?php echo $i ?>"><?php echo $hora['disponible']?></div>
            </div>
        <?php }else{?>
            <div class="caja" id="n<?php echo $i ?>" onclick="ccaja(this)">
                <div class="hora"><?php echo $ho?></div> 
                <div class="conta" id="c<?php echo $i ?>"><?php echo $hora['disponible']?></div>
            </div>
        <?php }?>
        <?php 
            $i++;
        ?>
    <?php }?>
</main>
<footer>
  FenixAlive @ 2021
</footer>
<script src="./js/main.js"></script>
</body>
</html>