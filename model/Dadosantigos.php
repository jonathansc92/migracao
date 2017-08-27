<?php

include($_SERVER['DOCUMENT_ROOT'] . '/migracao/configs/db/DB.php');

include($_SERVER['DOCUMENT_ROOT'] . '/migracao/model/Cores.php');
include($_SERVER['DOCUMENT_ROOT'] . '/migracao/model/Tamanhos.php');
include($_SERVER['DOCUMENT_ROOT'] . '/migracao/model/Produtoscores.php');
include($_SERVER['DOCUMENT_ROOT'] . '/migracao/model/Produtostamanhos.php');

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

        $cores = new Cores();
        $tamanhos = new Tamanhos();
        $produtos = new Produtos();
        $produtoscores = new Produtoscores();
        $produtostamanhos = new Produtostamanhos();

        foreach ($this->dataLst() as $value) {
            $colors[$value->cor] = $value->cor;
            $sizes[$value->tamanho] = $value->tamanho;

            $products[$value->titulo] = $value->titulo;
            $codes[$value->titulo] = $value->codigo;
        }

//        foreach ($colors as $color) {
//            $cores->insert($color);
//        }
//
//        foreach ($sizes as $size) {
//            $tamanhos->insert($size);
//        }
//
//        foreach ($products as $product) {
//            foreach ($codes as $code) {
//                $produtos->insert($code, $product);
//            }
//        }
// print '<pre>';
//                    print_R($produtos->dataLst());
//                    die();
        if (count($produtos->dataLst()) != 0) {

            foreach ($this->dataLst() as $dados) {
                $idProduto = $produtos->getID($dados->titulo);

                if (count($cores->dataLst()) != 0) {


//                    $produtoscores->insert($cores->getID($dados->cor), $idProduto);
                    $produtostamanhos->insert($tamanhos->getID($dados->tamanho), $idProduto);
                }

            }
        }
    }

//        print "<pre>";
//        print_r($cores->dataLst());
//        die();
//        foreach ($produtos as $produto) {
//            foreach ($codigo as $produtocodigo) {
//                $p = new DB('produtos');
//                $p->setAtribs(array('codigo', 'titulo'));
//             
//                $p->create(array($produtocodigo,$produto));
//            }
//        }
//        
//        foreach ($produtos as $produto) {
//            foreach ($codigo as $produtocodigo) {
//                $p = new DB('produtos');
//                $p->setAtribs(array('codigo', 'titulo'));
//             
//                $p->create(array($produtocodigo,$produto));
//            }
//        }
//        return $d;
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