<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

interface CifradorDeSenha
{
    public function cifrar(string $senha);
    public function verificar(string $senha, string $senhaCifrada): bool;
}