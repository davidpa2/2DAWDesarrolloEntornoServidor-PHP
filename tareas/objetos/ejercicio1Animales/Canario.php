<?php

require_once 'Ave.php';

class Canario extends Ave {

    protected $pia;
    protected $color;

    public function __construct($vivo, $alimentacion, $anios, $vuela, $embergadura, $pia, $color) {
        parent::__construct($vivo, $alimentacion, $anios, $vuela, $embergadura);
        $this->pia = $pia;
        $this->color = $color;
    }

    public function __toString() {
        return parent::__toString() . "Soy un canario de color " . $this->color . " y " . $this->pia . " pio de vez en cuando.";
    }
    
    public function estaVivo() {
        if ($this->pia == "si") {
            echo '<br>Piiiiii';
        } else {
            echo "<br>Morí";
        }
    }
    
    public function bebe() {
        echo "<br>Que rico chico glu gluuu";
    }
    
    public function seBalanceaEnElColumpio() {
        echo '<br>Piiiii pii pii juego!';
    }

    /**
     * Getters & setters
     * @return type
     */
    public function getPia() {
        return $this->pia;
    }

    public function getColor() {
        return $this->color;
    }

    public function setPia($pia): void {
        $this->pia = $pia;
    }

    public function setColor($color): void {
        $this->color = $color;
    }
}
