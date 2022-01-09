<?php

namespace Alura\Arquitetura\Gamificacao\Dominio\Selo;

use Alura\Arquitetura\Shared\Dominio\CPF;

interface RepositorioDeSelo
{
    public function adiciona(Selo $selo):void;

    public function selosDeAluno(CPF $cpf);
}