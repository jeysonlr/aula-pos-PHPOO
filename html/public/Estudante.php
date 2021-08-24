<?php

declare(strict_types=1);

class Estudante extends Pessoa
{
    /**
     * @var string
     */
    public $matricula;

    /**
     * @var string
     */
    public $ira;

    /**
     * @return string
     */
    public function disciplinasMatriculadas(): string
    {
        return "POO - PHP Orientado a Objetos";
    }

    /**
     * @param int $nota
     * @return int
     */
    public function atualizaIRA(int $nota): int
    {
        $this->ira += $nota;
        return $this->ira;
    }

    /**
     * @return object
     * @throws Throwable
     */
    public function verEstudante(): object
    {
        $conn = new Connection();
        $conectar = $conn->connect();

        $sql = "SELECT 
                    ID,
                    nome, 
                    telefone, 
                    email,
                    data_nascimento,
                    matricula,
                    ira
                FROM api_base.estudante e
                LEFT JOIN api_base.pessoa p on e.pessoa_id = p.ID 
                WHERE email = :email";

        $result = $conectar->prepare($sql);
        $result->execute(array(':email' => $this->email));

        return $result->fetchObject();
    }

    /**
     * @return float
     */
    public function calculaAvaliacao(): float
    {
        $ira = 50;
        $porcentagemPresenca = 80;

        return ($ira * $porcentagemPresenca);
    }

    public function criarEstudante(array $estudante): bool
    {
        $conn = new Connection();
        $conexao = $conn->connect();

        $sql = "INSERT INTO pessoa(nome, telefone, email, data_nascimento)
                VALUES(:nome, :telefone, :email, :data_nascimento)";

        $result = $conexao->prepare($sql);
        $result->execute(array(
            ':nome'=> $estudante['nome'],
            ':telefone'=> $estudante['telefone'],
            ':email'=> $estudante['email'],
            ':data_nascimento'=> $estudante['data_nascimento']
            )
        );

        $estudanteId = $conexao->lastInsertId();

        if ($estudanteId) {
            $sql = "INSERT INTO estudante(pessoa_id, matricula)
                    VALUES(:pessoa_id, :matricula)";

            $result = $conexao->prepare($sql);
            $result->execute(array(
                ':pessoa_id' => $estudanteId,
                ':matricula' => $estudante['matricula']
            ));

            if ($result->rowCount()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editarEstudante(array $estudante): bool
    {
        $conn = new Connection();
        $conexao = $conn->connect();

        $sql = "UPDATE pessoa 
                    SET nome = :nome, 
                        telefone = :telefone, 
                        email = :email, 
                        data_nascimento = :data_nascimento
                WHERE ID = :id";

        $result = $conexao->prepare($sql);
        $resultStatus = $result->execute(array(
           ':nome' => $estudante['nome'],
           ':telefone' => $estudante['telefone'],
           ':email' => $estudante['email'],
           ':data_nascimento' => $estudante['data_nascimento'],
           ':id' => $estudante['id']
        ));

        if ($resultStatus) {
            $sql = "UPDATE estudante
                        SET matricula = :matricula
                    WHERE pessoa_id = :id";

            $result = $conexao->prepare($sql);
            $resultStatus = $result->execute(array(
                ':matricula' => $estudante['matricula'],
                ':id' => $estudante['id']
            ));

            if ($resultStatus) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
