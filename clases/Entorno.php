<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entorno
 *
 * @author Usuario
 */
class Entorno {
    function __construct() {
        
    }
    public static function getServidor(){
        return $_SERVER['SERVER_NAME'];
    }
    public static function getPuerto(){
        return $_SERVER['SERVER_PORT'];
    }
    public static function getRaiz(){
        return $_SERVER['DOCUMENT_ROOT'];
    }
    public static function getMetodo(){
        return $_SERVER['REQUEST_METHOD'];
    }
    public static function getCadenaParametros(){
        return $_SERVER['QUERY_STRING'];
    }
    public static function getScript(){
        return $_SERVER['SCRIPT_NAME'];
    }
    public static function getPagina(){
        $script = self::getScript();
        $pos = strrpos($script, "/");
        return substr($script, $pos+1);
    }
    public static function getCarpetaServidor(){
        $script = self::getScript();
        $pos = strrpos($script, "/");
        return substr($script, 0, $pos+1);
    }
    public static function getPadreRaiz(){
        $raiz = self::getRaiz();
        $pos = strrpos($raiz, "/");
        return substr($raiz, $pos);
    }
    public static function getArrayParametros(){
        $array = Array();
        $parametros = self::getCadenaParametros();
        $partes = explode("&", $parametros);
        foreach($partes as $indices => $valor){
            $subpartes = explode("=", $valor);
            if(!isset($subPartes[1])){
                $subpartes[1]="";
            }
            /********************************************************************
            if(isset($array[$subPartes[0])){
                if(is_array($array[$subPartes[0]])){
                    $array[$subpartes[0]][]=subPartes[1];
                }else{
                    $subArray[] = 
                }
            }
             * 
             */
        }
    }
    public static function getEnlaceCarpeta($pagina){
        return "http://".self::getServidor().":".self::getPuerto().self::getCarpetaServidor().$pagina;
    }
    static function getNavegadorCliente(){
        return $_SERVER["http_user_agent"];
    }
    static function getIpCliente(){
        
    }
}
