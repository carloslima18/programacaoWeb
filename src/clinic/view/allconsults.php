<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://localhost/clinica/css2/deletepatient.css"/>
    <title>ler</title>
</head>
<body>

<div class="container">
    <h3><?php foreach ($this->session->getFlashBag()->all() as $type => $messages) {
            foreach ($messages as $message) {
                echo '<div class="alert alert-' . $type . '">' . $message . '</div>';
            }
        }
        ?></h3>

        <?php
        $t = count($this->consults);
        for($i = 0; $i<$t;$i++){
            $row = $this->consults[$i];
            echo "paciente:";
            echo "&nbsp";
            echo $row["pcpf"];
            echo "&nbsp";
            echo "data:";
            echo $row["cdata"];
            echo "&nbsp";
            echo "hora:";
            echo $row["hora"];
            echo "<br>";

        }

        ?>
    <br>
</div>


 <form name="todas consultas" action="/clinica/front.php/allconsults"  method="POST">
    <label><h3>CONSULTAS DO DIA:</h3></label>
    <input type="text" name="date" >
    <br/><br/>
    <input type="submit" value="CONSULTAR">
</form>
<a href="/clinica/front.php/data">voltarr</a><br/><br/>
</body>
</html>
