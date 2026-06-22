<?php

namespace DAL;

include_once __DIR__ . '/../DAL/conexao.php';
include_once __DIR__ . '/../MODEL/insumo.php';

class InsumoDAL{
    public function Select()
    {
        $sql = "SELECT * FROM insumo ORDER BY nome;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();

        $lstInsumo = [];

        foreach ($registros as $linha) {
            $insumo = new \MODEL\Insumo();
            $insumo->setId($linha['id']);
            $insumo->setNome($linha['nome']);
            $insumo->setTipo($linha['tipo']);
            $insumo->setUnidadeMedida($linha['unidade_medida']);
            $insumo->setQuantidadeEstoque($linha['quantidade_estoque']);
            $insumo->setImagem($linha['imagem']);

            $lstInsumo[] = $insumo;
        }

        return $lstInsumo;
    }

    public function SelectById(int $id)
    {
        $sql = "SELECT * FROM insumo WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        // Se nao encontrou, devolve null (a pagina trata isso sem quebrar).
        if (!$linha) {
            return null;
        }
        
        $insumo = new \MODEL\Insumo();
        $insumo->setId($linha['id']);
        $insumo->setNome($linha['nome']);
        $insumo->setTipo($linha['tipo']);
        $insumo->setUnidadeMedida($linha['unidade_medida']);
        $insumo->setQuantidadeEstoque($linha['quantidade_estoque']);
        $insumo->setImagem($linha['imagem']);

        return $insumo;
    }

    public function Insert(\MODEL\Insumo $insumo)
    {
        $sql = "INSERT INTO insumo
                (nome, tipo, unidade_medida, quantidade_estoque, imagem)
                VALUES (?, ?, ?, ?, ?);";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);

        $result = $query->execute(array(
            $insumo->getNome(),
            $insumo->getTipo(),
            $insumo->getUnidadeMedida(),
            $insumo->getQuantidadeEstoque(),
            $insumo->getImagem()
        ));

        $con = Conexao::desconectar();
        return $result;
    }

    public function Update(\MODEL\Insumo $insumo)
    {
        $sql = "UPDATE insumo
                SET nome = ?,
                    tipo = ?,
                    unidade_medida = ?,
                    quantidade_estoque = ?,
                    imagem = ?
                WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);

        $result = $query->execute(array(
            $insumo->getNome(),
            $insumo->getTipo(),
            $insumo->getUnidadeMedida(),
            $insumo->getQuantidadeEstoque(),
            $insumo->getImagem(),
            $insumo->getId()
        ));

        $con = Conexao::desconectar();

        return $result;
    }

    public function Delete(int $id)
    {
        // Tenta excluir. Se o insumo estiver em uso por alguma aplicacao,
        // a chave estrangeira impede e o PDO lanca excecao: devolvemos false.
        try {
            $sql = "DELETE FROM insumo WHERE id = ?;";
            $con = Conexao::conectar();
            $query = $con->prepare($sql);
            $result = $query->execute(array($id));
            $con = Conexao::desconectar();
            return $result;
        } catch (\PDOException $e) {
            return false;
        }

        $sql = "DELETE FROM insumo WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();

        return $result;
    }
}
?>