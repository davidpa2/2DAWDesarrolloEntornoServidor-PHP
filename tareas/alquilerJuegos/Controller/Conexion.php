<?php

class Conexion extends PDO {

    private $datosConexion = "mysql:host=localhost;dbname=alquiler_juegos;charset=utf8mb4";
    private $usu = "dwes";
    private $pass = "abc123.";
    private $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    public function __construct() {
        try {
            parent::__construct($this->datosConexion, $this->usu, $this->pass, $this->options);
        } catch (PDOException $ex) {
            echo 'ERROR: ' . $ex->getMessage();
        }
    }

    public function getHost() {
        return $this->host;
    }

    public function getDbname() {
        return $this->dbname;
    }

    public function getCharset() {
        return $this->charset;
    }

    public function getUsu() {
        return $this->usu;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getOptions() {
        return $this->options;
    }

    public function setHost($host): void {
        $this->host = $host;
    }

    public function setDbname($dbname): void {
        $this->dbname = $dbname;
    }

    public function setCharset($charset): void {
        $this->charset = $charset;
    }

    public function setUsu($usu): void {
        $this->usu = $usu;
    }

    public function setPass($pass): void {
        $this->pass = $pass;
    }

    public function setOptions($options): void {
        $this->options = $options;
    }
}
