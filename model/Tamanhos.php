<?php

class Tamanhos {

    public $table = 'tamanhos';

    public function dataLst() {

        $tamanhos = new DB('tamanhos');
        $tamanhos->setAtribs(array('titulo'));
        $tamanhosdata = $tamanhos->readLst();

        return $tamanhos;
    }

    public function insert($value) {
        $tamanhos = new DB('tamanhos');
        $tamanhos->setAtribs(array('titulo'));
        $tamanhos->create(array($value));
    }
    
     public function getID($param) {

        $tamanhos = new DB('tamanhos');
        $tamanhos->setID($param);
    }

}