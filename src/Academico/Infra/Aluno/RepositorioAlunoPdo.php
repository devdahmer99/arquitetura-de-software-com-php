<?php

namespace Infra\Aluno;


use Alura\Arquitetura\Academico\Dominio\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioAluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\Telefone;
Alura\Arquitetura\Shared\Dominio\CPF;use PDO;

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
        $sql = 'SELECT cpf, nome, email, ddd, numero as numero_telefone
                FROM alunos 
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

    private function mapearAluno(string $dadosAluno): Aluno
    {
        $primeiraLinha = $dadosAluno[0];
        $aluno = Aluno::dadosAlunos($primeiraLinha['cpf'], $primeiraLinha['nome'], $primeiraLinha['email']);
        $telefones = array_filter((array)$dadosAluno, fn ($linha) => $linha['ddd'] !== null && $linha['numero']);
        foreach($telefones as $linha) {
            $aluno->adicionarTelefone($linha['ddd'], $linha['numero']);

        }

        return $aluno;
    }

    public function buscarTodos(): array
    {
        $sql = 'SELECT cpf, nome, email, ddd, numero as numero_telefone FROM alunos
                LEFT JOIN telefones ON telefones.cpf = alunos.cpf';

        $stmt = $this->conexao->query($sql);

        $listaDadosAlunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $alunos = [];

        foreach($listaDadosAlunos as $dadosAluno) {
            if (!array_key_exists($dadosAluno['cpf'], (array)$alunos)) {
                $dadosAluno['cpf'] = Aluno::dadosAlunos(
                    $dadosAluno['cpf'],
                    $dadosAluno['nome'],
                    $dadosAluno['email']
                );
            }

            $alunos[$dadosAluno['cpf']]->adicionarTelefone($dadosAluno['ddd'], $dadosAluno['numero']);
        }

        return array_values((array)$alunos);
    }
}