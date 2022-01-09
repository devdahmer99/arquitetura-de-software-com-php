<?php
namespace Infra\Indicacao;


use Alura\Arquitetura\Academico\Dominio\Aluno;
use Alura\Arquitetura\Academico\Dominio\Indicacao\RepositorioIndicacao;
use PDO as PDOAlias;

class IndicacaoRepositorio implements RepositorioIndicacao
{

    private PDOAlias $conexao;

    public function __construct(PDOAlias $conexao)
    {
        $this->conexao = $conexao;
    }

    public function adicionarIndicacao(Aluno $alunoIndicante, $alunoIndicado): void
    {
       $sql = 'INSERT INTO indicacoes VALUES (:cpf_indicante, :cpf_indicado, :data_indicacao)';
       $stmt = $this->conexao->prepare($sql);
       $stmt->bindValue('cpf_indicante', $alunoIndicante->indicante());
       $stmt->bindValue('cpf_indicado', $alunoIndicado->indicado());
       $stmt->execute();
    }

    public function buscarIndicacoes(Aluno $indicacoes)
    {
        $sql = 'SELECT * FROM alunos al
            INNER JOIN telefones tel on tel.cpf_aluno = al.cpf
            LEFT JOIN indicacoes ind on ind.cpf_indicante = al.cpf
            ';
        $stmt = $this->conexao->query($sql);
        $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $stmt->execute();
    }
}