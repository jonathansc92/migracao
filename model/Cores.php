<?php

class Cores {

    public $table = 'cores';

    public function dataLst() {

        $cores = new DB('cores');
        $cores->setAtribs(array('titulo'));
        $coresdata = $cores->readLst();

        return $coresdata;
    }

    public function migraCores() {
        $cores = new DB('cores');
        $cores->setAtribs(array('titulo'));

        $antigos = new DB('dados_antigos');
        $antigos->setAtribs(array('cor'));
        $antigos->setDistinct();
        $antigos->readLst();

        foreach ($antigos->readLst() as $value) {
            $colors[$value->cor] = $value->cor;
        }


        foreach ($colors as $color) {
            $cores->create(array($color));
        }
    }

    public function getID($param) {

        $cores = new DB('cores');
       return $cores->setID(array($param));

//         print "<pre>";
//        print_R($cores->setID($param));
//        die();
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