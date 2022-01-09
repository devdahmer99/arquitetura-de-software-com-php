<?php

namespace Alura\Arquitetura\Gamificacao\App;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\Selo;
use Alura\Arquitetura\Shared\Evento\Evento;
use Alura\Arquitetura\Shared\Evento\OuvinteDEvento\OuvinteDeEvento;

class GeraSeloDeNovato extends OuvinteDeEvento
{
    private RepositorioDeSelo $repositorioDeSelo;

    /**
     * @param RepositorioDeSelo $repositorioDeSelo
     */
    public function __construct(RepositorioDeSelo $repositorioDeSelo)
    {
        $this->repositorioDeSelo = $repositorioDeSelo;
    }


    public function sabeProcessar(Evento $evento): bool
    {
        return get_class($evento) === 'Alura\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado';
    }


    public function reageAo(Evento $evento): bool
    {
        $array = $evento->jsonSerialize();
        $cpf = $array['cpfAluno'];

        $selo = new Selo($cpf, 'Novato');
        $this->repositorioDeSelo->adiciona($selo);
    }


}