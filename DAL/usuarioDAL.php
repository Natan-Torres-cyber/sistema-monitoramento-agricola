<?php

namespace DAL;

include_once __DIR__ . '/../DAL/conexao.php';
include_once __DIR__ . '/../MODEL/usuario.php';

class UsuarioDAL
{
    public function Select()
    {
        $sql = "SELECT * FROM usuario;";
        $con = Conexao::conectar();
        $registros = $con->query($sql);
        $con = Conexao::desconectar();

        $lstUsuario = [];

        foreach ($registros as $linha) {
            $usuario = new \MODEL\Usuario();

            $usuario->setId($linha['id']);
            $usuario->setNome($linha['nome']);
            $usuario->setEmail($linha['email']);
            $usuario->setSenha($linha['senha']);
            $usuario->setPerfil($linha['perfil']);

            $lstUsuario[] = $usuario;
        }

        return $lstUsuario;
    }

    public function SelectById(int $id)
    {
        $sql = "SELECT * FROM usuario WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $usuario = new \MODEL\Usuario();

        $usuario->setId($linha['id']);
        $usuario->setNome($linha['nome']);
        $usuario->setEmail($linha['email']);
        $usuario->setSenha($linha['senha']);
        $usuario->setPerfil($linha['perfil']);

        return $usuario;
    }

    public function SelectByEmail(string $email)
    {
        $sql = "SELECT * FROM usuario WHERE email = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($email));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        if (!$linha) {
            return null;
        }

        $usuario = new \MODEL\Usuario();

        $usuario->setId($linha['id']);
        $usuario->setNome($linha['nome']);
        $usuario->setEmail($linha['email']);
        $usuario->setSenha($linha['senha']);
        $usuario->setPerfil($linha['perfil']);

        return $usuario;
    }

    public function Insert(\MODEL\Usuario $usuario)
    {
        $sql = "INSERT INTO usuario
                (nome, email, senha, perfil)
                VALUES (?, ?, ?, ?);";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);

        $result = $query->execute(array(
            $usuario->getNome(),
            $usuario->getEmail(),
            $usuario->getSenha(),
            $usuario->getPerfil()
        ));

        $con = Conexao::desconectar();

        return $result;
    }

    public function Update(\MODEL\Usuario $usuario)
    {
        $sql = "UPDATE usuario
                SET nome = ?,
                    email = ?,
                    senha = ?,
                    perfil = ?
                WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);

        $result = $query->execute(array(
            $usuario->getNome(),
            $usuario->getEmail(),
            $usuario->getSenha(),
            $usuario->getPerfil(),
            $usuario->getId()
        ));

        $con = Conexao::desconectar();

        return $result;
    }

    public function Delete(int $id)
    {
        $sql = "DELETE FROM usuario WHERE id = ?;";

        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();

        return $result;
    }
}
?>