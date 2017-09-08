<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>indexDentist</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/clinica/css2/deletepatient.css"/>
</head>
<body>
<div id="interface" class="container">
    <?php
    foreach ($this->session->getFlashBag()->all() as $type => $messages) {
        foreach ($messages as $message) {
            echo '<div class="alert alert-'.$type.'">'.$message.'</div>';
        }
    }
    ?>
    <?php
    echo "";
    echo "<table id='tabela'>";
        echo "<caption> pacientes </caption>";
        while($row = pg_fetch_array($this->consults,null,PGSQL_ASSOC)) {
        echo "<tr style='color: black'>";
            echo "<td>" . "nome :" . $row["firstname"] . "</td>";
            echo "<td>" . "cpf :" . $row["cpf"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    <br>
</div>
<a href="/clinica/front.php/data">voltar</a><br/><br/>
</body>
</html>