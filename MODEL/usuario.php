<?php

namespace MODEL;

class usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $perfil;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }
}
?>