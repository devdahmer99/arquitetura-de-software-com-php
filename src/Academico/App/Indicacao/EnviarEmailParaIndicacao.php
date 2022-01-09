<?php
namespace Alura\Arquitetura\Academico\App\Indicacao;

use Alura\Arquitetura\Academico\Dominio\Aluno;

interface EnviarEmailParaIndicacao
{
    public function enviaPara(Aluno $alunoIndicado): void;
}