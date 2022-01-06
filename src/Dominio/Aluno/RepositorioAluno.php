<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Dominio\CPF;

interface RepositorioAluno
{
    public function adicionarAluno(Aluno $aluno): void;

    public function buscarAlunoPorCPF(CPF $cpf): Aluno;

}