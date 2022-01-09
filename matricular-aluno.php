<?php

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Infra\Aluno\RepositorioDeAlunoEmMemoria;

require_once 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$telefone = $argv[4];
$ddd = $argv[5];

$aluno = Aluno::dadosAlunos($cpf, $nome, $email)
    ->adicionarTelefone($ddd, $telefone);

$repositorio = new RepositorioDeAlunoEmMemoria();
$repositorio->adicionarAluno($aluno);
