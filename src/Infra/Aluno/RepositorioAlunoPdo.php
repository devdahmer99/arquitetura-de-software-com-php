<?php

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\RepositorioAluno;
use Alura\Arquitetura\Dominio\Aluno\Telefone;
use Alura\Arquitetura\Dominio\CPF;

class RepositorioAlunoPdo implements RepositorioAluno
{
    private PDO $conexao;

    public function __construct(\PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function adicionarAluno(Aluno $aluno): void
    {
        $sql = 'INSERT INTO alunos VALUES (:cpf, :nome, :email);';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf', $aluno->cpf());
        $stmt->bindValue('nome', $aluno->nome());
        $stmt->bindValue('email', $aluno->email());
        $stmt->execute();

        $sql = 'INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno)';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf_aluno', $aluno->cpf());

        /** @var Telefone $telefone */
        foreach($aluno->telefones() as $telefone)  {
            $stmt->bindValue('ddd', $telefone->ddd());
            $stmt->bindValue('numero', $telefone->numero());
            $stmt->execute();
        }
    }

    public function buscarAlunoPorCPF(CPF $cpf): Aluno
    {
        $sql = 'SELECT cpf, nome, email, ddd, numero as numero_telefone FROM alunos 
                LEFT JOIN telefones on telefones.cpf_aluno = alunos.cpf 
                WHERE alunos.cpf = ?';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('1', (string) $cpf);
        $stmt->execute();

        $dadosAluno = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($dadosAluno) === 0) {
            throw new AlunoNaoEncontrado($cpf);
        }

        return $this->mapearAluno($dadosAluno);
    }
}