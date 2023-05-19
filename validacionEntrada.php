<?php

function validarEntrada($datos) {
    
    if (!isset($datos['genero_id']) || !is_numeric($datos['genero_id']) || $datos['genero_id'] <= 0) {
        return false;
    }

    if (!isset($datos['identificacion']) || !ctype_alnum($datos['identificacion'])) {
        return false;
    }

    if (!isset($datos['nombre']) || strlen($datos['nombre']) < 2) {
        return false;
    }

    if (!isset($datos['email']) || !filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    if (!isset($datos['fecha_nac']) || !DateTime::createFromFormat('Y-m-d', $datos['fecha_nac'])) {
        return false;
    }

    return true; 
  }
?>
