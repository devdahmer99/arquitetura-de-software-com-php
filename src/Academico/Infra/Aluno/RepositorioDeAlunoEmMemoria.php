<?php

namespace Infra\Aluno;



use Alura\Arquitetura\Academico\Dominio\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioAluno;
Alura\Arquitetura\Shared\Dominio\CPF;
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
            throw new \Infra\Aluno\AlunoNaoEncontrado($cpf);
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