<?php

class Produtos {

    public $table = 'produtos';

    public function dataLst() {
        $produtos = new DB($this->table);
        $produtos->setAtribs(array('codigo', 'titulo'));
        $produtosdata = $produtos->readLst();

        return $produtosdata;
    }

    public function migraProdutos() {
        $produtos = new DB($this->table);
        $produtos->setAtribs(array('codigo', 'titulo'));

        $antigos = new DB('dados_antigos');
        $antigos->setAtribs(array('codigo', 'titulo'));
        $antigos->setDistinct();
        $antigos->readLst();

//        foreach ($antigos->readLst() as $value) {
        for ($i = 0; $i < count($antigos->readLst()); $i++) {
            $products[$antigos->readLst()[$i]->titulo] = $antigos->readLst()[$i]->titulo;
            $codes[$antigos->readLst()[$i]->codigo] = $antigos->readLst()[$i]->codigo;
            
            $produtos->create(array($codes[$antigos->readLst()[$i]->codigo], $products[$antigos->readLst()[$i]->titulo]));
        }


//        foreach ($products as $product) {
//            foreach ($codes as $code) {
//                $produtos->create(array($code, $product));
//            }
//        }
    }

    public function getID($param) {

        $produtos = new DB('produtos');
        return $produtos->setID(array($param));

    }

}