<?php
namespace Alura\Arquitetura\App\Indicacao;

use Alura\Arquitetura\Dominio\Aluno\Aluno;

interface EnviarEmailParaIndicacao
{
    public function enviaPara(Aluno $alunoIndicado): void;
}