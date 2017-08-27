<?php

class Produtostamanhos {

    public $table = 'produtos_tamanhos';
    public function dataLst() {
        $produtos_tamanhos = new DB('produtos_tamanhos');
        $produtos_tamanhos->setAtribs(array('id_produto_cor', 'id_tamanho'));
        $produtos_tamanhosdata = $produtos_tamanhos->readLst();

        return $produtos_tamanhosdata;
    }

    public function insert($cor, $tamanho) {

        $produtos_tamanhos = new DB('produtos_tamanhos');
        $produtos_tamanhos->setAtribs(array('id_produto_cor', 'id_tamanho'));
        return $produtos_tamanhos->create(array($cor, $tamanho));
    }

}
