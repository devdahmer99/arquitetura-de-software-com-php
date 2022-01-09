<?php
namespace Infra\Indicacao;


use Alura\Arquitetura\Academico\App\Indicacao\EnviarEmailParaIndicacao;
use Alura\Arquitetura\Academico\Dominio\Aluno;
use Alura\Arquitetura\Academico\Dominio\Email;
use http\Exception\InvalidArgumentException;

/**
 * @property Email $endereco
 */
class EnviarEmailPara implements EnviarEmailParaIndicacao
{

    public function enviaPara(Aluno $alunoIndicado, Email $email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException('Endereco de e-mail inválido');
        }
        $this->endereco = $email;

        return mail('eduardodahmer99@gmail.com', 'Teste de Envio de E-mail', 'Ola, este é apenas um
        teste de envio');
    }
}