<?php

class Tamanhos {

    public $table = 'tamanhos';

    public function dataLst() {

        $tamanhos = new DB('tamanhos');
        $tamanhos->setAtribs(array('titulo'));
        $tamanhosdata = $tamanhos->readLst();

        return $tamanhos;
    }

    public function migraTamanhos() {
        $tamanhos = new DB('tamanhos');
        $tamanhos->setAtribs(array('titulo'));

        $antigos = new DB('dados_antigos');
        $antigos->setAtribs(array('tamanho'));
        $antigos->setDistinct();
        $antigos->readLst();

        foreach ($antigos->readLst() as $value) {
            $sizes[$value->tamanho] = $value->tamanho;
        }

        foreach ($sizes as $size) {

             $tamanhos->create(array($size));
        }
    }

    public function getID($param) {

        $tamanhos = new DB('tamanhos');
        return $tamanhos->setID(array($param));
    }

}
