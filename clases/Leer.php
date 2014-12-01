<?php

/**
 * Class Leer
 * 
 * @version 0.9
 * @author izv
 * @license http://...
 * @copyright (c) izv, 2daw
 * Esta clase contiene métodos estaticos para la lectura
 * de parametros a traves del metodo post y get
 */
//comprobar los filtros!!!!!

class Leer {
    /**
     * Trata de leer el parámetro de entrada que pasa
     * como parametro
     * @access public
     * @param string $param cadena con el nombre del parametro
     * @return string|array|null Devuelve una cadena con el valor del parámetro
     * no se ha pasado y un array si el parametro es multiple.
     */
    public static function get($param, $filtrar=true){
        if (isset($_GET[$param])) {
            if (Leer::isArray($param)) {
                Leer::leeArray($_GET[$param]);
            } else {
                if($filtrar){
                    return Leer::limpiar($_GET[$param]);
                }else{
                    return $_GET[$param];
                }
            }
        } else {
            return NULL;
        }
    }
     public static function post($param, $filtrar=true){
        if (isset($_POST[$param])) {
            if(Leer::isArray($param)){
                Leer::leeArray($_POST[$param]);
            } else {
                if($filtrar){
                    return Leer::limpiar($_POST[$param]);
                }else{
                    return $_POST[$param];
                }
            }
        } else {
            return NULL;
        }
    }
    public static function isArray($param){
        if(isset($_GET[$param])){
            return is_array($_GET[$param]);
        }elseif(isset($_POST[$param])){
            return is_array($_POST[$param]);
        }
        return NULL;
    }

    private static function leeArray($param, $filtrar=true){
        $array = Array();
        foreach ($param as $indice -> $valor){
            $array[] = Leer::limpiar($valor);
        }
        return $array;
    }
   
    public static function request($param, $filtrar=true){
        $v = Leer::get($param);
        if($v==NULL){
            $v = Leer::post($param);
        }
        return $v;
        
        if(isset($_POST[$param])){
            if(!empty($_POST[$param])){
                return Leer::limpiar($_POST[$param]);
            }else{
                return "";
            }
        }else{
            return NULL;
        }
    }
    private static function limpiar($param){
        return htmlspecialchars($param);
    }
}
