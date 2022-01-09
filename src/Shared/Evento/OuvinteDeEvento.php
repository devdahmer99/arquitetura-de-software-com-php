<?php

namespace Alura\Arquitetura\Shared\Evento\OuvinteDEvento;

use Alura\Arquitetura\Shared\Evento\Evento;

abstract class OuvinteDeEvento
{
    public function processa(Evento $evento)
    {
        if ($this->sabeProcessar($evento)) {
            $this->reageAo($evento);
        }
    }

abstract public function sabeProcessar(): bool;
abstract public function reageAo(): bool;
}