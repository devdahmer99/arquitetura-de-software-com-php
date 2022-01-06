<?php

namespace Alura\Arquitetura\Dominio;

/**
 * @property string $setNumero
 */
class CPF implements \Stringable
{
    private string $numero;

    public function __construct(string $numero)
    {
        $this->setNumero = $numero;
    }

    public function setNumero(string $numero):void
    {
        $opcoes = [
            'opcoes' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];

        if(filter_var($numero, FILTER_VALIDATE_REGEXP, $opcoes) === false) {
            throw new \InvalidArgumentException('CPF informado é inválido');
        }


        $this->numero = $numero;
    }

    public function __toString(): string
    {
       return $this->numero;
    }
}