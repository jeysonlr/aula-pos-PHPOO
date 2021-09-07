<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Estudante</title>
</head>

<body>

    <h1>Cadastro de Estudante</h1>

    <?php
    require './Pessoa.php';
    require './Estudante.php';

    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($formData)) {
        $estudante = new Estudante($formData['email']);
        $cadastro = $estudante->criarEstudante($formData);

        if ($cadastro) {
            echo "Estudante cadastrado com sucesso!";
        } else {
            echo "Ocorreu um problema ao cadastrar Estudante.";
        }
    }
    ?>

    <form name="CadastroEstudante" action="" method="POST">
        <p>
            <label>Nome</label>
            <input type="text" name="nome" required>
        </p>
        <p>
            <label>Telefone</label>
            <input type="text" name="telefone">
        </p>
        <p>
            <label>Email</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Data Nascimento</label>
            <input type="text" name="data_nascimento">
        </p>
        <p>
            <label>Matrícula</label>
            <input type="text" name="matricula">
        </p>
        <input type="submit" value="Cadastrar Estudante" name="CadastrarEstudante">
</body>

</html>