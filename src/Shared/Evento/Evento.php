<?php

namespace Alura\Arquitetura\Shared\Evento;

interface Evento
{
    public function momento(): \DateTimeImmutable;
}