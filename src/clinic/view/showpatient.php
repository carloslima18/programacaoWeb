<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://localhost/clinica/css2/deletepatient.css"/>
    <title>ler</title>
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
</div>
<form name="cadastro" action="/clinica/front.php/allpatients"  method="POST">
    <label><h3>DIGITE O CPF DO CLIENTE:</h3></label>
    <input type="text" name="cpf" >
    <br/><br/>
    <input type="submit" value="Pesquisar">
</form>
<a href="/clinica/front.php/data">voltar</a><br/><br/>
</body>
</html>