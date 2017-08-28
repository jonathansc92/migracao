<?php

include($_SERVER['DOCUMENT_ROOT'] . '/migracao/configs/db/DB.php');

include($_SERVER['DOCUMENT_ROOT'] . '/migracao/model/Cores.php');
include($_SERVER['DOCUMENT_ROOT'] . '/migracao/model/Tamanhos.php');
include($_SERVER['DOCUMENT_ROOT'] . '/migracao/model/Produtoscores.php');
include($_SERVER['DOCUMENT_ROOT'] . '/migracao/model/Produtostamanhos.php');

class Dadosantigos {

    public $table = 'dados_antigos';

    public function dataLst() {
        $con = new DB($this->table);
        $con->setAtribs(array('codigo', 'titulo', 'cor', 'tamanho'));
        $data = $con->readLst();

        return $data;
    }

    public function getID($param) {

        $dados_antigos = new DB('dados_antigos');
        $dados_antigos->setID($param);
    }

    public function migration() {
        $produtos = new Produtos();
        $produtos->migraProdutos();
        
        $cores = new Cores();
        $cores->migraCores();
//
        $tamanhos = new Tamanhos();
        $tamanhos->migraTamanhos();

        $produtoscores = new Produtoscores();
        $produtoscores->migraProdutoscores();
        
        $produtostamanhos = new Produtostamanhos();
        $produtostamanhos->migraProdutostamanhos();

    }

}
