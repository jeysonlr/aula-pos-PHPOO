<?php

declare(strict_types=1);

require './Connection.php';

class Pessoa
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

    public function __construct(
        int $id
    ) {
        $this->id = $id;
    }

    public function verDados(): object
    {
        $conn = new Connection();
        $conectar = $conn->connect();

        $sql = "SELECT nome, telefone, email
                FROM api_base.pessoa
                WHERE id = :id";

        $result = $conectar->prepare($sql);
        $result->execute(array(':id' => $this->id));
        
        return $result->fetchObject();
    }
}