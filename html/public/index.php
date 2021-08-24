<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 'true');

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de gestão acadêmica</title>
</head>
<body>
    <h2>Estudante</h2>
    <?php
        require './Pessoa.php';
        require './Estudante.php';
        require './Professor.php';

        $estudante = new Estudante('jeysonlr@gmail.com');
        echo $estudante->disciplinasMatriculadas().'<br>';

        echo '<br><hr>';

        $estudanteDados = $estudante->verEstudante();

        echo "Nome estudante: {$estudanteDados->nome} <br>";
        echo "Telefone: {$estudanteDados->telefone} <br>";
        echo "Email: {$estudanteDados->email} <br>";
        echo "Data nascimento: {$estudanteDados->data_nascimento} <br>";
        echo "Idade: {$estudante->calculaIdade($estudanteDados->data_nascimento)} <br>";
        echo "Matricula: {$estudanteDados->matricula} <br>";
        echo "IRA: {$estudanteDados->ira} <br>";
        echo utf8_decode("Avaliação do aluno: {$estudante->calculaAvaliacao()}").'<br>';

    ?>

    <br><hr>

    <h2>Professor</h2>
    <?php
        $conexao = new Connection();
        $professores = $conexao->listaProfessores();

        foreach ($professores as $professor) {
            echo utf8_decode($professor['nome'])." <a href='editarEstudante.php?email={$professor['email']}'>Editar</a><br>";
        }

    ?>
</body>
</html>
