<?php
namespace Alura\Arquitetura\Testes\Dominio;
use Alura\Arquitetura\Dominio\CPF;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfComNumeroInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        new CPF('12345678910');
    }

    public function testCpfComoString()
    {
        $cpf = new CPF('123.456.789-10');
        $this->assertSame('123.456.789-10', (string) $cpf);
    }
}