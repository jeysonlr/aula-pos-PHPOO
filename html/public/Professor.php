<?php

declare(strict_types=1);

class Professor extends Pessoa
{
    /**
     * @var string
     */
    public $especialidade;

    /**
     * @var float
     */
    public $salario;

    public function verProfessor(): object
    {
        $conn = new Connection();
        $conectar = $conn->connect();

        $sql = "SELECT 
                    nome, 
                    telefone, 
                    email, 
                    especialidade, 
                    salario, 
                    data_nascimento
                FROM api_base.professor pr
                LEFT JOIN api_base.pessoa pe on pr.pessoa_id = pe.ID 
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
        $qtdDisciplinasMinistradas = 100;
        $qtdAnosInstituicao = 12;

        return ($qtdDisciplinasMinistradas * $qtdAnosInstituicao);
    }
}
