<?php

namespace Alura\Arquitetura\Testes\Dominio\Aluno;

use Alura\Arquitetura\Dominio\Aluno\Telefone;
use PHPUnit\Framework\TestCase;

class Telefonetest extends TestCase
{
    public function testTelefoneRepresentadoComoString()
    {
        $telefone = new Telefone('24', '2222222');
        $this->assertSame('(24) 222222', (string) $telefone);
    }

    public function testTelefoneDDDInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('DDD Inválido');
        new Telefone('ddd', '2222222');
    }

    public function testTelefoneNumeroInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('Numero de telefone Invalido');
        new Telefone('24', 'numero');
    }
}