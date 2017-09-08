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

    <h2> PACIENTE: <?=$this->patient->getName()?></h2>
    <br>
    <h3> CONSULTAS MARCADAS: <?php
        $consults = $this->patient->getAllConsults();
        if(!count($consults) == 0){
            foreach ($consults as $consult){
                echo $consult."<BR>";
            }
        }
        else{
            echo "Nenhuma consulta marcada"."<BR>";
        }
        ?>
    </h3>
    <h4>
        CPF: <?php echo $this->patient->getCpf()."<BR>";?>
        RG: <?php echo $this->patient->getRg()."<BR>";?>
        Email: <?php echo $this->patient->getEmail()."<BR>";?>
        Sexo: <?php echo $this->patient->getSex()."<BR>";?>
    </h4>
    <form name="excluir" action="/clinica/front.php/deletepatient" method="POST">
        <h2>INSIRA O CPF PARA CONFIRMAR, CASO QUEIRA EXCLUIR PACIENTE:</h2><br>
        <input type="text" name="cpf" >
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</div>
 </div>
<a href="/clinica/front.php/showpatient">voltar</a><br/><br/>
</body>
</html>