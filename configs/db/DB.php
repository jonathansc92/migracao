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

    public function lst() {
        $data = $this->con()->query('SELECT ' . implode(',', $this->atribs) . ' FROM ' . $this->table);

        while ($row = $data->fetch(PDO::FETCH_OBJ)) {
            $rowLst[] = $row;
        }

        return $rowLst;
    }

    public function create() {
        $stmt = $pdo->prepare('INSERT INTO '.$this->table.' VALUES(:nome)');
        $insert = $stmt->execute(array(
            ':nome' => 'Ricardo Arrigoni'
        ));
        
        return $insert;
    }

    public function setAtribs($atrib) {
        if (isset($this)) {
            $this->atribs = $atrib;
        }
    }

}

//