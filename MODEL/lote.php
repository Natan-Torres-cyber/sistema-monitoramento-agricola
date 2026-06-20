<?php

namespace MODEL;

class lote
{
    private $id;
    private $nome;
    private $cultura;
    private $area_hectares;
    private $localizacao;

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

    public function getCultura()
    {
        return $this->cultura;
    }

    public function setCultura($cultura)
    {
        $this->cultura = $cultura;
    }

    public function getAreaHectares()
    {
        return $this->area_hectares;
    }

    public function setAreaHectares($area_hectares)
    {
        $this->area_hectares = $area_hectares;
    }

    public function getLocalizacao()
    {
        return $this->localizacao;
    }

    public function setLocalizacao($localizacao)
    {
        $this->localizacao = $localizacao;
    }
}
?>