<?php

namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/MODEL/aplicacao.php";

class AplicacaoDAL
{
    public function Select()
    {
        $sql = "SELECT * FROM aplicacao;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();

        $lstAplicacao = [];

        foreach ($registros as $linha) {
            $aplicacao = new \MODEL\Aplicacao();

            $aplicacao->setId($linha['id']);
            $aplicacao->setDataAplicacao($linha['data_aplicacao']);
            $aplicacao->setQuantidadeUtilizada($linha['quantidade_utilizada']);
            $aplicacao->setObservacao($linha['observacao']);
            $aplicacao->setInsumoId($linha['insumo_id']);
            $aplicacao->setLoteId($linha['lote_id']);
            $aplicacao->setUsuarioId($linha['usuario_id']);

            $lstAplicacao[] = $aplicacao;
        }

        return $lstAplicacao;
    }

    public function SelectById(int $id)
    {
        $sql = "SELECT * FROM aplicacao WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $aplicacao = new \MODEL\Aplicacao();

        $aplicacao->setId($linha['id']);
        $aplicacao->setDataAplicacao($linha['data_aplicacao']);
        $aplicacao->setQuantidadeUtilizada($linha['quantidade_utilizada']);
        $aplicacao->setObservacao($linha['observacao']);
        $aplicacao->setInsumoId($linha['insumo_id']);
        $aplicacao->setLoteId($linha['lote_id']);
        $aplicacao->setUsuarioId($linha['usuario_id']);

        return $aplicacao;
    }

    public function Insert(\MODEL\Aplicacao $aplicacao)
    {
        $sql = "INSERT INTO aplicacao
                (data_aplicacao, quantidade_utilizada, observacao, insumo_id, lote_id, usuario_id)
                VALUES (?, ?, ?, ?, ?, ?);";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);

        $result = $query->execute(array(
            $aplicacao->getDataAplicacao(),
            $aplicacao->getQuantidadeUtilizada(),
            $aplicacao->getObservacao(),
            $aplicacao->getInsumoId(),
            $aplicacao->getLoteId(),
            $aplicacao->getUsuarioId()
        ));

        $con = Conexao::desconectar();

        return $result;
    }

    public function Update(\MODEL\Aplicacao $aplicacao)
    {
        $sql = "UPDATE aplicacao
                SET data_aplicacao = ?,
                    quantidade_utilizada = ?,
                    observacao = ?,
                    insumo_id = ?,
                    lote_id = ?,
                    usuario_id = ?
                WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);

        $result = $query->execute(array(
            $aplicacao->getDataAplicacao(),
            $aplicacao->getQuantidadeUtilizada(),
            $aplicacao->getObservacao(),
            $aplicacao->getInsumoId(),
            $aplicacao->getLoteId(),
            $aplicacao->getUsuarioId(),
            $aplicacao->getId()
        ));

        $con = Conexao::desconectar();

        return $result;
    }

    public function Delete(int $id)
    {
        $sql = "DELETE FROM aplicacao WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();

        return $result;
    }
}
?>