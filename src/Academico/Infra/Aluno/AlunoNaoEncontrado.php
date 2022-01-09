<?php


namespace Infra\Aluno;
class AlunoNaoEncontrado extends \DomainException
{

    public function __construct($cpf)
    {
        parent::__construct('Aluno com CPF $cpf não encontrado');
    }
}