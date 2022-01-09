<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno;
use Alura\Arquitetura\Shared\Dominio\CPF;
interface RepositorioAluno
{
    public function adicionarAluno(Aluno $aluno): void;

    public function buscarAlunoPorCPF(CPF $cpf): Aluno;

}