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
     * @return array
     */
    public function verEstudante(): array
    {
        $dados['Nome'] = $this->nome;
        $dados['Matricula'] = $this->matricula;
        $dados['IRA'] = $this->ira;

        return $dados;
    }
}
