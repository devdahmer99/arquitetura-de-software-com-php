<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use http\Exception\InvalidArgumentException;

class Telefone implements \Stringable, \Countable
{
    private string $ddd;
    private string $numero;

    /**
     * @param string $ddd
     * @param string $numero
     */
    public function __construct(string $ddd, string $numero)
    {
        $this->setDDD($ddd);
        $this->setNumero($numero);
    }

    public function setDDD(string $ddd):void
    {
        if (preg_match('/\d{2}/', $ddd) !== 1) {
            throw new InvalidArgumentException('O ddd informado não é válido');
        }
        $this->ddd = $ddd;
    }

    public function setNumero(string $numero): void
    {
        if (preg_match('/\d{8,9}/', $numero) !== 1) {
            throw new InvalidArgumentException('O numero informado não é válido');
        }
        $this->numero = $numero;
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->numero}";
    }

    public function ddd(): string
    {
        return $this->ddd;
    }


    public function numero(): string
    {
        return $this->numero;
    }


}