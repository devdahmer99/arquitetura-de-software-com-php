<?php
namespace Alura\Arquitetura\Shared\Evento;
use Alura\Arquitetura\Shared\Dominio\CPF;
use Alura\Arquitetura\Shared\Evento\Evento;
/**
 * @property \DateTimeImmutable $momento
 * @property CPF $cpfAluno
 */
class AlunoMatriculado implements Evento
{
    private \DateTimeImmutable $momento;
    private CPF $aluno;

    public function __construct(\DateTimeImmutable $momento, CPF $cpfAluno)
    {
        $this->momento = new \DateTimeImmutable();
        $this->cpfAluno = $cpfAluno;
    }

    public function cpfAluno(): CPF
    {
        return $this->cpfAluno;
    }

    public function momento(): \DateTimeImmutable
    {
       return $this->momento;
    }
}