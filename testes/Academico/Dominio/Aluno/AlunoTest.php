<?php
namespace Alura\Arquitetura\Testes\Dominio\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno;
Alura\Arquitetura\Shared\Dominio\CPF;use Alura\Arquitetura\Academico\Dominio\Email;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    private Aluno $aluno;

    protected function setUp(): void
    {
        $this->aluno = new Aluno(
            $this->createStub(CPF::class),
            $this->createStub(Email::class)
        );
    }

    public function testAdicionaDoisTelefonesAMais()
    {
        $this->expectException(\DomainException::class);
        $this->aluno->adicionarTelefone('51', '2222222');
        $this->aluno->adicionarTelefone('51', '9999999');
        $this->aluno->adicionarTelefone('51', '12345678');
    }

    public function testAdicionarTelefone()
    {
        $this->aluno->adicionarTelefone('51', '222222');
        $this->assertCount(1, $this->aluno->telefones());
    }

    public function testAdicionarMaisDeUmTelefone()
    {
        $this->aluno->adicionarTelefone('24', '2222222');
        $this->aluno->adicionarTelefone('24', '9999999');

        $this->assertCount(2, $this->aluno->telefones());
    }
}