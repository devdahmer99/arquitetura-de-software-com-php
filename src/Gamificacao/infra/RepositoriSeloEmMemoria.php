<?php

namespace Alura\Arquitetura\Gamificacao\Infra\Selo;

use Alura\Arquitetura\Dominio\CPF;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\Selo;

class RepositoriSeloEmMemoria implements RepositorioDeSelo
{
    private array $selos = [];

    public function adiciona(Selo $selo): void
    {
        $this->selos[] = $selo;
    }

    public function seloDeAluno(CPF $cpf): array
    {
        return array_filter($this->selos, fn(Selo $selo) => $selo->cpfAluno() == $cpf);
    }
}