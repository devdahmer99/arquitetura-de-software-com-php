<?php

namespace Alura\Arquitetura\Academico\Dominio\Indicacao;



use Alura\Arquitetura\Academico\Dominio\Aluno;

interface RepositorioIndicacao
{
    public function adicionarIndicacao(Aluno $alunoIndicante, $alunoIndicado): void;

    public function buscarIndicacoes(Aluno $indicacoes): void;
}