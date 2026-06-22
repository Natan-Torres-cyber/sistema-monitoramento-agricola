<?php

namespace MODEL;

class aplicacao
{
    private $id;
    private $data_aplicacao;
    private $quantidade_utilizada;
    private $observacao;

    public $insumo_id; 
    public $lote_id;
    public $usuario_id;
    public $insumo_nome;  
    public $lote_nome;    
    public $usuario_nome; 

    public function getId(){return $this->id;
    }
    public function setId($id) { $this->id = $id;}

    public function getDataAplicacao() { return $this->data_aplicacao;}
    public function setDataAplicacao($data_aplicacao) { $this->data_aplicacao = $data_aplicacao;}

    public function getQuantidadeUtilizada() { return $this->quantidade_utilizada;}
    public function setQuantidadeUtilizada($quantidade_utilizada) { $this->quantidade_utilizada = $quantidade_utilizada;}

    public function getObservacao() { return $this->observacao;}
    public function setObservacao($observacao) { $this->observacao = $observacao;}

    public function getInsumoId() { return $this->insumo_id;}
    public function setInsumoId($insumo_id) { $this->insumo_id = $insumo_id;}

    public function getLoteId() { return $this->lote_id;}
    public function setLoteId($lote_id) { $this->lote_id = $lote_id;}

    public function getUsuarioId() { return $this->usuario_id;}
    public function setUsuarioId($usuario_id) { $this->usuario_id = $usuario_id;}
}
?>