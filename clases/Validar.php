<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validar
 *
 * @author Usuario
 */
class Validar {
    static function isCorreo($v){
        return filter_var($v, FILTER_VALIDATE_EMAIL);
    }
    static function isEntero($v){
        return filter_var($v, FILTER_VALIDATE_INT);
    }
    static function isNumero($v){
        return filter_var($v, FILTER_VALIDATE_FLOAT);
    }
    static function isTelefono($v){
        
    }
    static function isURL($v){
        return filter_var($v, FILTER_VALIDATE_URL);
    }
    static function isFecha($v){
        //deberes para casa
    }
    static function isIP($v){
        return filter_var($v, FILTER_VALIDATE_IP);
    }
    static function isCondicion($v){
        return filter_var($v, FILTER_VALIDATE_IP);
    }
    static function isAltaUsuario($login, $clave, $claveconfirmada, $nombre, $apellidos, $email){
        return true;
    }
}
