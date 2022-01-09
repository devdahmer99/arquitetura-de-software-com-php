<?php

namespace Alura\Infra\Aluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\RepositorioAluno;
use Alura\Arquitetura\Dominio\CPF;

class RepositorioDeAlunoEmMemoria implements RepositorioAluno
{
    private array $alunos = [];
    public function adicionarAluno(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    public function buscarAlunoPorCPF(CPF $cpf): Aluno
    {
        $alunosFiltrados = array_filter($this->alunos, fn(Aluno $aluno) => $aluno->cpf() == $cpf);

        if (count($alunosFiltrados) === 0) {
            throw new \AlunoNaoEncontrado($cpf);
        }

        if (count($alunosFiltrados) > 1) {
            throw new \Exception();
        }

        return $alunosFiltrados[1];
    }

    public function buscarTodos():array
    {
        return $this->alunos;
    }
}