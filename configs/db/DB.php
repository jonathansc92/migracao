<?php

class DB {

    public $atribs;
    public $distinct;

    public function __construct($table) {
        $this->table = $table;
        $this->host = 'localhost';
        $this->dbname = 'migracao';
        $this->user = 'root';
        $this->password = '';
    }

    public function con() {
        $con = new PDO("mysql:host=localhost;dbname=migracao", "root", "");
        return $con;
    }

    public function readLst() {
        $data = $this->con()->query('SELECT ' . $this->distinct .' '. implode(',', $this->atribs) . ' FROM ' . $this->table);

//        $data .= ' WHERE '.$this->atribs .$this->term. $this->value ;

        while ($row = $data->fetch(PDO::FETCH_OBJ)) {
            $rowLst[] = $row;
        }

        return $rowLst;
    }

    public function setID($param) {

        $sql = 'SELECT * FROM ' . $this->table;
        $sql .= ' WHERE titulo = ?';

        $stmt = $this->con()->prepare($sql);
        $stmt->execute($param);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                
        foreach ($rows as $stmt) {

            $id = $stmt['id'];
        }
       
        return $id;
    }

    public function create($value) {

        $atributos = implode(',', $this->atribs);

        $sql = 'INSERT INTO ' . $this->table;
        $sql .= "($atributos)";
        $sql .= 'VALUES(' . str_replace($this->atribs, '?', $atributos) . ')';
//         print '<pre>';
//        print_R($value);
//        die();
        $stmt = $this->con()->prepare($sql);
        $i = 1;
        foreach ($value as $field) {
//print '<pre>';
//        print_R($field);
//        die();
            $stmt->bindValue($i++, $field);
        }

        
        $stmt->execute();
        
//        print '<pre>';
//        print_R($stmt);
//        die();
    }

    public function setAtribs($atrib) {
        if (isset($this)) {
            $this->atribs = $atrib;
        }
    }
    
    public function setDistinct() {
        if (isset($this)) {
            $this->distinct = 'DISTINCT';
        }
    }

}

//