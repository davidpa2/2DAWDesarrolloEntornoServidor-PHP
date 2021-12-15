<?php

class Conexion extends mysqli {
    private $host="localhost";
    private $usu="dwes";
    private $pass="abc123.";
    private $dataBase="objetos";
    
    public function __construct() {
        parent::__construct($this->host, $this->usu, $this->pass, $this->dataBase);
        if (mysqli_connect_errno()) {
            die("ERROR DE CONEXION");
        } 
    }

    public function getHost() {
        return $this->host;
    }

    public function getUsu() {
        return $this->usu;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getDataBase() {
        return $this->dataBase;
    }

    public function setHost($host): void {
        $this->host = $host;
    }

    public function setUsu($usu): void {
        $this->usu = $usu;
    }

    public function setPass($pass): void {
        $this->pass = $pass;
    }

    public function setDataBase($dataBase): void {
        $this->dataBase = $dataBase;
    }

}
