<?php
function validarFecha($fecha) {
    if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $fecha)) { 
        return true;
    }
}
