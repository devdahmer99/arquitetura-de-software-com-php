<?php

namespace Alura\Arquitetura\Gamificacao\Dominio\Selo;



use Alura\Arquitetura\Shared\Dominio\CPF;

class Selo implements \Stringable
{
    private CPF $cpf;
    private string $nome;

    /**
     * @param CPF $cpf
     * @param string $nome
     */
    public function __construct(CPF $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
    }

    public function cpfAluno(): CPF
    {
        return $this->cpf;
    }

    public function __toString(): string
    {
        return $this->nome;
    }


}