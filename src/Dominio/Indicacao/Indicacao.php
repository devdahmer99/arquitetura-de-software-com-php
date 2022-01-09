<?php

namespace Alura\Arquitetura\Dominio\Indicacao;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use DateTimeImmutable as DateTimeImmutableAlias;

class Indicacao
{
    private Aluno $indicante;
    private Aluno $indicado;
    private DateTimeImmutableAlias $data;

    /**
     * @param Aluno $indicante
     * @param Aluno $indicado
     */
    public function __construct(Aluno $indicante, Aluno $indicado)
    {
        $this->indicante = $indicante;
        $this->indicado = $indicado;

        $this->data = new \DateTimeImmutable();
    }

    public function indicante(Aluno $alunoIndicante): Aluno
    {
        return $this->indicante;
    }

    public function indicado(Aluno $alunoIndicado): Aluno
    {
        return $this->indicado;
    }
}