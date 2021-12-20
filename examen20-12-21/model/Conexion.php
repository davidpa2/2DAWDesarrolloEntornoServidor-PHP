<?php

class Conexion extends PDO {

    private $datosConexion = "mysql:host=localhost;dbname=zoo;charset=utf8mb4";
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

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

}

