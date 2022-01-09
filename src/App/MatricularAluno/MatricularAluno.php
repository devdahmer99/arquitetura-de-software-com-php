<?php
namespace Alura\Arquitetura\App\Aluno\MatricularAluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\RepositorioAluno;

/**
 * @property $cpf
 */
class MatricularAluno
{
    private RepositorioAluno $repositorioAluno;
    private $email;

    public function __construct(RepositorioAluno $repositorioAluno)
    {
        $this->repositorioAluno = $repositorioAluno;
    }

    public function executa(MatricularAluno $dados): void
    {
        $alunos = Aluno::dadosAlunos($dados->cpf, $dados->email, $dados->nome);
        $this->repositorioAluno->adicionarAluno($alunos);
    }
}