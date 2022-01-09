<?php

namespace Alura\Arquitetura\Gamificacao\App\BuscarSelosDeUsuario;

use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use Alura\Arquitetura\Shared\Dominio\CPF;

class BuscaSelosUsuario
{
    private RepositorioDeSelo $repositorioDeSelo;

    public function __construct(RepositorioDeSelo $repositorioDeSelo)
    {
        $this->repositorioDeSelo = $repositorioDeSelo;
    }

    public function executa(BuscarSelosUsuarioDto $dados)
    {
        $cpfAluno = new CPF($dados->cpf);
        return $this->repositorioDeSelo->selosDeAluno($cpfAluno);
    }
}