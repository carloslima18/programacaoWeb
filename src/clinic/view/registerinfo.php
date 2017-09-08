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
    <h1>Informações do paciente.</h1><br>
    <h2> PACIENTE: <?=$this->patient->getName()?></h2>
    <br>
    <h4>
        Data de nascimento: <?php echo $this->patient->getData()."<BR>";?>
        CPF: <?php echo $this->patient->getCpf()."<BR>";?>
        RG: <?php echo $this->patient->getRg()."<BR>";?>
        Telefone: : <?php echo $this->patient->getPhone()."<BR>";?>
        Email: <?php echo $this->patient->getEmail()."<BR>";?>
        Sexo: <?php echo $this->patient->getSex()."<BR>";?>
    </h4>

</div>
<a href="/clinica/front.php/data">voltar</a><br/><br/>
</body>
</html>