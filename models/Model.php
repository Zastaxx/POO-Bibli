<?php

abstract class Model{
    private $pdo;

    private function setDB(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=bibliotheque;charset=utf8","root","");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }

    protected function getDB(){
        if($this->pdo == null){
            $this->setDb();
        }
        return $this->pdo;
    }
}