<?php

namespace Alura\Arquitetura\Academico\Dominio;

 use Alura\Arquitetura\Shared\Dominio\CPF;
 use Alura\Arquitetura\Academico\Dominio\Email;
use Alura\Arquitetura\Academico\Dominio\Aluno\Telefone;

/**
 * @method indicante()
 */
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
        $this->telefones = [];
    }

    /**
     * @throws \Exception
     */
    public function adicionarTelefone(string $ddd, string $numero): self
    {
        if (count($this->telefones) === 2) {
            throw new \Exception('Aluno já possui dois numeros cadastrados. Não pode adicionar
            outro');
        }

        $this->telefones[] = new Telefone($ddd, $numero);
        return $this;
    }

    public function cpf(): CPF
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
    public function telefones(): Telefone
    {
        return $this->telefones;
    }
}