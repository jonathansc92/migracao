<?php

class Cores {

    public $table = 'cores';

    public function dataLst() {

        $cores = new DB('cores');
        $cores->setAtribs(array('titulo'));
        $coresdata = $cores->readLst();

        return $coresdata;
    }

    public function insert($value) {
        $cores = new DB('cores');
        $cores->setAtribs(array('titulo'));
        $cores->create(array($value));
    }

    public function getID($param) {

        $cores = new DB('cores');
        $cores->setID($param);
    }

}

//$rs = $con->query('SELECT * FROM dados_antigos');
//
//
//while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
//
//    print "<pre>";
//    print_R($row);
//    die();
//    echo $row->idpessoa . '<br />';
//    echo $row->nome . '<br />';
//    echo $row->email . '<br />';
//}