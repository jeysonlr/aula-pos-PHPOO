<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Estudante</title>
</head>
<body>

    <h1>Edição de Estudante</h1>

    <?php
    require './Pessoa.php';
    require './Estudante.php';

    $estudante = new Estudante($_GET['email']);

    if (isset($_POST['editarEstudante'])) {
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $estudante = new Estudante($formData['email']);
            $estudanteDados = $estudante->editarEstudante($formData);

        if ($estudanteDados) {
            echo "Estudante editado com sucesso!";
            echo "<a href='index.php'>Voltar</a>";
        } else {
            echo "Ocorreu um problema ao editar Estudante.";
        }
    } else {
        $estudanteDados = $estudante->verEstudante();?>

        <form name="EdicaoEstudante" action="" method="POST">
        <input type="hidden" name="id" value="<?=$estudanteDados->ID?>">
        <p>
            <label>Nome</label>
            <input type="text" name="nome" required value="<?=$estudanteDados->nome?>">
        </p>
        <p>
            <label>Telefone</label>
            <input type="text" name="telefone" value="<?=$estudanteDados->telefone?>">
        </p>
        <p>
            <label>Email</label>
            <input type="text" name="email" value="<?=$estudanteDados->email?>">
        </p>
        <p>
            <label>Data Nascimento</label>
            <input type="text" name="data_nascimento" value="<?=$estudanteDados->data_nascimento?>">
        </p>
        <p>
            <label>Matrícula</label>
            <input type="text" name="matricula" value="<?=$estudanteDados->matricula?>">
        </p>
        <input type="submit" value="Editar Estudante" name="editarEstudante">
        </form>
    <?php
    }
    ?>
    <br>

</body>
</html>