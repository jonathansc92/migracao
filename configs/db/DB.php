<?php

class DB {

    public $atribs;

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

//        $data .= ' WHERE '.$this->atribs .$this->term. $this->value ;

        while ($row = $data->fetch(PDO::FETCH_OBJ)) {
            $rowLst[] = $row;
        }

        return $rowLst;
    }

    public function setID($param) {

        $data = $this->con()->prepare('SELECT * FROM ' . $this->table . ' WHERE titulo = ?');
//        $data->bindParam(':titulo', $param, PDO::PARAM_STR);
        $data->execute(array($param));
        $rows = $data->fetchAll(PDO::FETCH_ASSOC);
        

                
        foreach ($rows as $data) {

            $id = $data['id'];
        }
// print '<pre>';
//        print_R($id);
//        die();
       
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

            $stmt->bindValue($i++, $field);
        }

//        print '<pre>';
//        print_R($sql);
//        die();
        $stmt->execute();
    }

    public function setAtribs($atrib) {
        if (isset($this)) {
            $this->atribs = $atrib;
        }
    }

}

//