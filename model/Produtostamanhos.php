<?php

class Produtostamanhos {

    public $table = 'produtos_tamanhos';

    public function dataLst() {
        $produtos_tamanhos = new DB('produtos_tamanhos');
        $data = $produtos_tamanhos->con()->query('SELECT tamanhos.titulo as tamanho, produtos.titulo as produto, produtos.codigo as codigo, cores.titulo as cor FROM produtos_tamanhos 
                    INNER JOIN produtos_cores ON (produtos_cores.id = produtos_tamanhos.id_produto_cor  ) 
                    INNER JOIN cores ON (cores.id = produtos_cores.id_cor  ) 
                    INNER JOIN tamanhos ON (tamanhos.id = produtos_tamanhos.id_tamanho  ) 
                    INNER JOIN produtos ON (produtos.id = produtos_cores.id_produto  )');


        while ($row = $data->fetch(PDO::FETCH_OBJ)) {
            $rowLst[] = $row;
        }

        return $rowLst;
    }

    public function migraProdutostamanhos() {
        $ptamanhos = new DB($this->table);
        $ptamanhos->setAtribs(array('id_produto_cor', 'id_tamanho'));

        $antigos = new DB('dados_antigos');
        $antigos->setAtribs(array('titulo', 'cor', 'tamanho'));
//        $antigos->setDistinct();
        $antigos->readLst();

        $cor = new Cores();
        $tamanho = new Tamanhos();
        $produto = new Produtos();
        $produtocor = new Produtoscores();

        for ($i = 0; $i < count($antigos->readLst()); $i++) {
            $data[$antigos->readLst()[$i]->titulo] = $produto->getID($antigos->readLst()[$i]->titulo);

            $data[$antigos->readLst()[$i]->cor] = $cor->getID($antigos->readLst()[$i]->cor);

            $data[$antigos->readLst()[$i]->tamanho] = $tamanho->getID($antigos->readLst()[$i]->tamanho);

            $data['ProdutocorID'] = $produtocor->getIDProdutocor($produto->getID($antigos->readLst()[$i]->titulo), $cor->getID($antigos->readLst()[$i]->cor));

            $ptamanhos->create(array($data['ProdutocorID'], $data[$antigos->readLst()[$i]->tamanho]));
        }

    }

}
