
<?php
require_once __DIR__ . '../../../../vendor/autoload.php';
use clinic\view\Calendar;

//iframe
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>calendario</title>
</head>
<link rel="stylesheet" type="text/css" href="/clinica/css2/agenda.css"/>
<body>
<div class="calendario">
    <?php
    $resp = new Calendar();
    $resp->montaCalendario();
   // $oi =  $resp->retiraData();
    ////echo "<h1>oiiiiii.$oi</h1>";


    ?>
</div>
</body>
</html>
