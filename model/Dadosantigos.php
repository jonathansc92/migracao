<?php

include($_SERVER['DOCUMENT_ROOT'] . '/migracao/configs/db/DB.php');

//$m = $_SERVER['DOCUMENT_ROOT'] . '/migracao/configs/db/DB.php';
//
//print "<pre>";
//print_r($m);
//die();
class Dadosantigos {

    public $table = 'dados_antigos';

//public function __construct(){
//    $this->table = ''
//}

    public function dataLst() {
        $con = new DB($this->table);
        $con->setAtribs(array('codigo', 'titulo', 'cor', 'tamanho'));
        $data = $con->readLst();

        return $data;
    }

    public function migrar() {
        $con = new DB($this->table);
        $con->setAtribs(array('codigo', 'titulo', 'cor', 'tamanho'));
        $data = $con->readLst();

        foreach ($data as $value) {
            
            for($i=0;$i<count($value->cor);$i++){
                    print '<pre>';
            print_R($value->cor[$i]);
            die();
                $cor = new DB('cores');
                $cor->setAtribs(array('titulo'));
                $cor->create('cor');
                $cor->setValue($value->cor[$i]);
            }
            $d[] = $value->cor;
        }

        return $d;
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