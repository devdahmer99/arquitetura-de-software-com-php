<?php

namespace Alura\Arquitetura\Dominio\Indicacao;

use Alura\Arquitetura\Aluno\Aluno;
use DateTimeImmutable as DateTimeImmutableAlias;

class Indicacao
{
    private Aluno $indicante;
    private Aluno $indicaddo;
    private DateTimeImmutableAlias $data;

    /**
     * @param Aluno $indicante
     * @param Aluno $indicaddo
     */
    public function __construct(Aluno $indicante, Aluno $indicaddo)
    {
        $this->indicante = $indicante;
        $this->indicaddo = $indicaddo;

        $this->data = new \DateTimeImmutable();
    }
}