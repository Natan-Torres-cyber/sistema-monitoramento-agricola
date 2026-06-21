<?php

namespace DAL;

include_once __DIR__ . '/../DAL/conexao.php';
include_once __DIR__ . '/../MODEL/lote.php';

class LoteDAL
{
    public function Select()
    {
        $sql = "SELECT * FROM lote;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();

        $lstLote = [];

        foreach ($registros as $linha) {
            $lote = new \MODEL\Lote();

            $lote->setId($linha['id']);
            $lote->setNome($linha['nome']);
            $lote->setCultura($linha['cultura']);
            $lote->setAreaHectares($linha['area_hectares']);
            $lote->setLocalizacao($linha['localizacao']);

            $lstLote[] = $lote;
        }

        return $lstLote;
    }

    public function SelectById(int $id)
    {
        $sql = "SELECT * FROM lote WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $lote = new \MODEL\Lote();

        $lote->setId($linha['id']);
        $lote->setNome($linha['nome']);
        $lote->setCultura($linha['cultura']);
        $lote->setAreaHectares($linha['area_hectares']);
        $lote->setLocalizacao($linha['localizacao']);

        return $lote;
    }

    public function Insert(\MODEL\Lote $lote)
    {
        $sql = "INSERT INTO lote
                (nome, cultura, area_hectares, localizacao)
                VALUES (?, ?, ?, ?);";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);

        $result = $query->execute(array(
            $lote->getNome(),
            $lote->getCultura(),
            $lote->getAreaHectares(),
            $lote->getLocalizacao()
        ));

        $con = Conexao::desconectar();

        return $result;
    }

    public function Update(\MODEL\Lote $lote)
    {
        $sql = "UPDATE lote
                SET nome = ?,
                    cultura = ?,
                    area_hectares = ?,
                    localizacao = ?
                WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);

        $result = $query->execute(array(
            $lote->getNome(),
            $lote->getCultura(),
            $lote->getAreaHectares(),
            $lote->getLocalizacao(),
            $lote->getId()
        ));

        $con = Conexao::desconectar();

        return $result;
    }

    public function Delete(int $id)
    {
        $sql = "DELETE FROM lote WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();

        return $result;
    }
}
?>