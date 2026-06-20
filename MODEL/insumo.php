<?php
namespace MODEL;

class Insumo {
    private $id;
    private $nome;
    private $tipo;
    private $unidade_medida;
    private $quantidade_estoque;
    private $imagem;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }

    public function getTipo() { return $this->tipo; }
    public function setTipo($tipo) { $this->tipo = $tipo; }

    public function getUnidadeMedida() { return $this->unidade_medida; }
    public function setUnidadeMedida($unidade_medida) { $this->unidade_medida = $unidade_medida; }

    public function getQuantidadeEstoque() { return $this->quantidade_estoque; }
    public function setQuantidadeEstoque($quantidade_estoque) { $this->quantidade_estoque = $quantidade_estoque; }

    public function getImagem() { return $this->imagem; }
    public function setImagem($imagem) { $this->imagem = $imagem; }
}
?>