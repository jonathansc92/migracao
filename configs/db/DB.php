<?php

class DB {

    public $atribs;
    public $value;

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
        $data = $this->con()->query('SELECT ' . implode(',', $this->atribs) . ' FROM ' . $this->table);

        while ($row = $data->fetch(PDO::FETCH_OBJ)) {
            $rowLst[] = $row;
        }

        return $rowLst;
    }

    public function create() {
        $atributos = implode(',', $this->atribs);

        $sql = 'INSERT INTO ' . $this->table;
        $sql .= '(' . $atributos . ')';
//        $sql .= 'VALUES(' . str_replace($this->atribs, '?', implode(',', $this->atribs)) . ')';
        $sql .= 'VALUES(:' . $atributos . ')';
           
        $stmt = $this->con()->prepare($sql);

        for ($i = 0; $i < count($this->atribs); $i++) {
            
            print '<pre>';
            print_R($this->value);
            die();
            $param1 = ':'.$this->atribs[$i];
            $param2 = $this->value;
            
             
            $stmt->bindParam($param1, $param2);


        }
        
        return $stmt->execute();
  
    }

    public function setAtribs($atrib) {
        if (isset($this)) {
            $this->atribs = $atrib;
        }
    }
    
    public function setValue($value) {
        if (isset($this)) {
            $this->value = $value;
        }
    }

}

//