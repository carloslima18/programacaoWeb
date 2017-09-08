<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>indexDentist</title>
     <link rel="stylesheet" type="text/css" href="http://localhost/clinica/css2/home.css"/>
</head>
<body>
<div class="container">
    <h2><?php foreach ($this->session->getFlashBag()->all() as $type => $messages) {
            foreach ($messages as $message) {
                echo '<div class="alert alert-'.$type.'">'.$message.'</div>';
            }
        }
        ?></h2>
    <br>
    <?php

        $row = $this->consults;
        echo "paciente:";
        echo "&nbsp";
        echo $row["firstname"];
        echo "&nbsp";
        echo "data:";
        echo $row["cdata"];
        echo "&nbsp";
        echo "hora:";
        echo $row["hora"];
        echo "<br>";




    ?>
    <br>
</div>
<a href="/clinica/front.php/data">voltar</a><br/><br/>
</body>
</html>