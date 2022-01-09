<?php

namespace Alura\Arquitetura\Dominio\Indicacao;

use Alura\Arquitetura\Dominio\Aluno\Aluno;

interface RepositorioIndicacao
{
    public function adicionarIndicacao(Aluno $alunoIndicante, $alunoIndicado): void;

    public function buscarIndicacoes(Aluno $indicacoes): void;
}