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
        $produtos = new DB('produtos');
        $produtos->setAtribs(array('codigo', 'titulo'));
        $produtosdata = $produtos->readLst();

        return $produtosdata;
    }

    public function insert($code, $produto) {
        $produtos = new DB('produtos');
        $produtos->setAtribs(array('codigo', 'titulo'));
        $produtos->create(array($code, $produto));
    }

    public function getID($param) {

        $produtos = new DB('produtos');
        return $produtos->setID($param);
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