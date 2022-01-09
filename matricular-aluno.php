<?php

use Alura\Arquitetura\App\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\App\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\LogDeAlunoMatriculado;
use Alura\Arquitetura\Dominio\PublicadorDeEvento;
use Infra\Aluno\RepositorioDeAlunoEmMemoria;

require_once 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$telefone = $argv[4];
$ddd = $argv[5];

$publicador = new PublicadorDeEvento();
$publicador->adicionarOuvinte(new LogDeAlunoMatriculado());
$useCase = new MatricularAluno(new RepositorioDeAlunoEmMemoria(), $publicador);

$useCase->executa(new MatricularAlunoDto($cpf, $nome, $email));
