<?php
namespace Alura\Arquitetura\Testes\App\Aluno;

use Alura\Arquitetura\App\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\App\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Cpf;
use Alura\Infra\Aluno\RepositorioDeAlunoEmMemoria;
use PHPUnit\Framework\TestCase;


class MatricularAlunoTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        $dadosAluno = new MatricularAlunoDto('123.456.789-100', 'Teste',
        'email@example.com');
        $repositorioDeAluno = new RepositorioDeAlunoEmMemoria();
        $useCase = new MatricularAluno($repositorioDeAluno);

        $useCase->executa($dadosAluno);

        $aluno =$repositorioDeAluno->buscarAlunoPorCPF(new Cpf('123.456.789-10'));
        $this->assertSame('Teste', (string) $aluno->nome());
        $this->assertSame('email@example.com', (string) $aluno->email());
        $this->assertEmpty($aluno->telefones());
    }
}