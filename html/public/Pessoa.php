<?php

declare(strict_types=1);

require './Connection.php';

abstract class Pessoa
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $nome;

    /**
     * @var string
     */
    public $telefone;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $dataNascimento;

    public function __construct(
        string $email
    ) {
        $this->email = $email;
    }

    /**
     * @return object
     * @throws Throwable
     */
    public function verDados(): object
    {
        $conn = new Connection();
        $conectar = $conn->connect();

        $sql = "SELECT 
                    nome, 
                    telefone, 
                    email
                FROM api_base.pessoa
                WHERE email = :email";

        $result = $conectar->prepare($sql);
        $result->execute(array(':id' => $this->id));
        
        return $result->fetchObject();
    }

    public function calculaIdade(string $dataNascimento): int
    {
        $date = new DateTime($dataNascimento);
        $intervalo = $date->diff(New DateTime(date('Y-m-d')));
        return intval($intervalo->format('%Y'));
    }

    abstract public function calculaAvaliacao();
}