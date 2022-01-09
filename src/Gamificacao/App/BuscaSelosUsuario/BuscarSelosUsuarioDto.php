<?php

namespace Alura\Arquitetura\Gamificacao\App\BuscarSelosDeUsuario;

class BuscarSelosUsuarioDto
{
    private string $cpfAluno;

    public function __construct(string $cpfAluno)
    {
        $this->cpfAluno = $cpfAluno;
    }
}