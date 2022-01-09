<?php

namespace Alura\Arquitetura\Shared\Evento;


use Alura\Arquitetura\Shared\Evento\OuvinteDEvento\OuvinteDeEvento;

class PublicadorDeEvento
{
    private array $ouvintes = [];
    public function adicionarOuvinte(OuvinteDeEvento $ouvinte):void
    {
        $this->ouvintes[] = $ouvinte;
    }

    public function publicar(Evento $evento): void
    {
        /** @var OuvinteDeEvento $ouvinte */
        foreach($this->ouvintes as $ouvinte) {
            $ouvinte->processa($evento);
        }
    }
}