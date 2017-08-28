<?php

class Produtoscores {

    public $table = 'produtos_cores';

    public function dataLst() {
        $produtos_cores = new DB($this->table);
        $produtos_cores->setAtribs(array('id_cor', 'id_produto'));
        $produtos_coresdata = $produtos_cores->readLst();

        return $produtos_coresdata;
    }

    public function migraProdutoscores() {
        $pcores = new DB($this->table);
        $pcores->setAtribs(array('id_cor', 'id_produto'));

        $antigos = new DB('dados_antigos');
        $antigos->setAtribs(array('titulo', 'cor'));
        $antigos->setDistinct();
        $antigos->readLst();

        $cor = new Cores();
        $produto = new Produtos();

        for ($i = 0; $i < count($antigos->readLst()); $i++) {

            $products[$antigos->readLst()[$i]->titulo] = $produto->getID($antigos->readLst()[$i]->titulo);
            $colors[$antigos->readLst()[$i]->cor] = $cor->getID($antigos->readLst()[$i]->cor);

             $pcores->create(array($colors[$antigos->readLst()[$i]->cor], $products[$antigos->readLst()[$i]->titulo]));
        }

    }

    public function getIDProdutocor($idProduto, $idCor) {
        $con = new DB($this->table);

        $sql = 'SELECT * FROM ' . $this->table;
        $sql .= ' WHERE id_produto = ' . $idProduto;
        $sql .= ' AND id_cor= ' . $idCor;



        $stmt = $con->con()->prepare($sql);
        $stmt->execute();



        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $stmt) {

            $id = $stmt['id'];
        }
        
//        print '<pre>';
//        print_r($id);
//        die();

        return $id;
    }

//    public function getID($produto, $cor) {
//
//        $pcores = new DB($this->table);
//        return $pcores->setID(array($produto, $cor));
//    }
}
