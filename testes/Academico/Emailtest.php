<?php

namespace Alura\Arquitetura\Testes\Dominio;


use Alura\Arquitetura\Academico\Dominio\Email;
use PHPUnit\Framework\TestCase;

class Emailtest extends TestCase
{
    public function testEmailInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('email inválido');
    }

    public function testEmailComString()
    {
        $email = new Email('endereco@example.com');
        $this->assertSame('endereco@example.com', (string) $email);
    }
}