<?php

class Produtoscores {

    public $table = 'produtos_cores';

    public function dataLst() {
        $produtos_cores = new DB('produtos_cores');
        $produtos_cores->setAtribs(array('id_cor', 'id_produto'));
        $produtos_coresdata = $produtos_cores->readLst();

        return $produtos_coresdata;
    }

    public function insert($cor, $produto) {

        $produtos_cores = new DB('produtos_cores');
        $produtos_cores->setAtribs(array('id_cor', 'id_produto'));
        return $produtos_cores->create(array($produto, $cor));
    }

}