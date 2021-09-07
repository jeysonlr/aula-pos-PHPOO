<?php

class Disciplina
{
    /**
     * @var string
     */
    public $nome;

    /**
     * @var string
     */
    private $codigo;

    /**
     * @var int
     */
    public $creditos;

    /**
     * @var static
     */
    public static $ministrada;

    public static function ministrarDisciplina()
    {
        self::$ministrada++;
    }

    public function verDisciplina()
    {
        return "{$this->nome} ({$this->codigo}) - {$this->creditos} créditos - " . self::$ministrada;
    }

    /**
     * @return  string
     */
    public function getCodigo(): string
    {
        return $this->codigo;
    }

    /**
     * @param  string  $codigo
     * @return  void
     */
    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }
}
