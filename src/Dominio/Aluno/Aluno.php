<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Dominio\CPF;
use Alura\Arquitetura\Dominio\Email;

class Aluno
{
    private string $cpf;
    private string $nome;
    private Email $email;
    private Telefone $telefones;

    public static function dadosAlunos(string $numeroCPF, string $email, string $nomeAluno):self
    {
        return new Aluno(new CPF($numeroCPF), $nomeAluno, new Email($email));
    }

    public function __construct(CPF $cpf, string $nome, Email $email)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
    }

    public function adicionarTelefone(string $ddd, string $numero)
    {
        $this->telefones[] = new Telefone($ddd, $numero);
        return $this;
    }

    public function cpf(): string
    {
        return $this->cpf;
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function email(): string
    {
        return $this->email;
    }

    /*
    * @return Telefone[]
    */
    public function telefones(): array
    {
        return $this->telefones;
    }
}