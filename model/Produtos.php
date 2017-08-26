<?php

//include($_SERVER['DOCUMENT_ROOT'] . '/migracao/configs/db/DB.php');

//$m = $_SERVER['DOCUMENT_ROOT'] . '/migracao/configs/db/DB.php';
//
//print "<pre>";
//print_r($m);
//die();
class Produtos {

    public $table = 'produtos';

//public function __construct(){
//    $this->table = ''
//}

    public function dataLst() {
        $con = new DB($this->table);
        $data = $con->readLst();

        while ($row = $data->fetch(PDO::FETCH_OBJ)) {

            $row->codigo;
            $row->titulo;

            $rowLst[] = $row;
        }

        return $rowLst;
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