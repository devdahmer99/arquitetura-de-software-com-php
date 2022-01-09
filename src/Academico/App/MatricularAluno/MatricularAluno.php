<?php
namespace Alura\Arquitetura\Academico\App\Aluno\MatricularAluno;



use Alura\Arquitetura\Academico\Dominio\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioAluno;
use Alura\Arquitetura\Shared\Evento\AlunoMatriculado;
use Alura\Arquitetura\Shared\Evento\PublicadorDeEvento;

/**
 * @property $cpf
 */
class MatricularAluno
{
    private RepositorioAluno $repositorioAluno;
    private $email;
    private PublicadorDeEvento $publicador;

    public function __construct(RepositorioAluno $repositorioAluno, PublicadorDeEvento $publicador)
    {
        $this->repositorioAluno = $repositorioAluno;
        $this->publicador = $publicador;
    }

    public function executa(MatricularAluno $dados): void
    {
        $aluno = Aluno::dadosAlunos($dados->cpf, $dados->email, $dados->nome);
        $this->repositorioAluno->adicionarAluno($aluno);

        $evento = new AlunoMatriculado($aluno->cpf());
        $this->publicador->publicar($evento);


    }
}