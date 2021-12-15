<?php

/*
 * Una clase o método FINAL quiere decir que no puede ser redefinido en otra clase hija
 * Una clase ABSTRACTA quiere decir que no puede instanciarse, pero puede tener clases hijas
 * que sean instanciadas
 * Una clase INTERFAZ es aquella en la que se declaran métodos sin estar escritos, por ello
 * obliga que en las clases que implementen la interfaz deben estar definidos esos métodos
 */
class Persona {
    public $nombre;
    protected $apellidos;
    protected $edad;
    protected static $numpersonas = 0;

    public function __construct($nombre="Franchescou", $apellidos="Fernandes", $edad=6) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        //Para referenciar a la propiedad estática hay que usar self::
        self::$numpersonas++;
    }
    
    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name=$value;
    }

    /**
     * si se escribe: echo $p se ejecuta el toString
     * @return type
     */
    public function __toString() {
        return "Me llamo ".$this->nombre. " " .$this->apellidos." y tengo " . $this->edad. " años";
    }
    
    /**
     * cuando se llama al método close() se ejecuta esta función mágica
     */
    public function __clone() {
        //$this->edad = 0;
        self::$numpersonas++;
    }
    
    /**
     * Cuando se llama a unset() se ejecuta automáticamente
     */
    public function __destruct() {
        self::$numpersonas--;
    }
    
    /**
     * __call() se usa para la sobrecarga de métodos
     * si existe un método no definido en la clase, se ejecuta __call
     * @param type $name : nombre del método que se ha llamado 
     * @param type $arguments es un array con los argumentos pasados
     */
    public function __call($name, $arguments) {
        if ($name=="muestra"){
            if (count($arguments) == 1) {
                echo "<br>El nombre es: ".$arguments[0];
            }
            if (count($arguments) == 2) {
                echo "<br>El nombre es: ". $arguments[0]. " y el apellido ".$arguments[1];
            }
        }
    }
        
    /**
     * Para acceder desde el exterior a una propiedad estática, hace falta un método estático
     * @return type
     */
    public static function getNumPersonas() {
        return self::$numpersonas;
    }

    /**
     * GETTERS & SETTERS
     * @return type
     */
    /*public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }

    public function setEdad($edad): void {
        $this->edad = $edad;
    }*/

}